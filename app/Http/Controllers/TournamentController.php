<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TournamentController extends Controller
{
    public function showTeams()
    {
        try{
            session_unset();
            return view('step-1');
        } catch (Exception $e) {
            return redirect()->back()->with('ExceptionError', $e->getMessage());
        }
    }

    public function saveTeams(Request $request)
    {
        try{
            $request->validate([
                'teams' => 'required|array|min:8|max:8', // Ensure there are exactly 8 teams
                'teams.*' => 'required|string|max:255|distinct', // Each team must be a unique, non-empty string
            ], [
                'teams.required' => 'You must enter 8 teams.',
                'teams.array' => 'Teams data must be an array.',
                'teams.min' => 'You must enter exactly 8 teams.',
                'teams.max' => 'You can only enter exactly 8 teams.',
                'teams.*.required' => 'Each team name is required.',
                'teams.*.string' => 'Each team name must be a string.',
                'teams.*.max' => 'Each team name must be less than 255 characters.',
                'teams.*.distinct' => 'Each team name must be unique.',
            ]);

            $request->session()->put('teams', $request->teams);

            Team::truncate();
            $teamAraay = [];
            foreach ($request->teams as $teamName) {
                $teamAraay[] = ['name'=> $teamName];
            }
            Team::insert($teamAraay);
            return redirect()->route('tournament.stepTwo');
        } catch (Exception $e) {
            return redirect()->back()->with('ExceptionError', $e->getMessage());
        }
    }

    public function stepTwoShow(Request $request)
    {
        try{
            $winners = Team::inRandomOrder()->limit(4)->get()->toArray();
            return view('step-2', compact('winners'));
        } catch (Exception $e) {
            return redirect()->back()->with('ExceptionError', $e->getMessage());
        }
    }

    public function stepTwoSave(Request $request)
    {   
        $randomKeys = array_rand($request->teams, 2);
        $stepTwoWinnerteam = [$request->teams[$randomKeys[0]], $request->teams[$randomKeys[1]]];
        $request->session()->put('stepTwoTeams', $stepTwoWinnerteam);
        return redirect()->route('tournament.stepThree');
    }

    public function stepThreeShow(Request $request)
    {
        $wildCardEntry = Team::inRandomOrder()->whereNotIn('name', $request->session()->get('stepTwoTeams'))->limit(2)->pluck('name')->toArray();
        $winners = array_merge($request->session()->get('stepTwoTeams'), $wildCardEntry);
        return view('step-3', compact('winners'));
    }

    public function stepThreeSave(Request $request)
    {
        try{
            $randomKeys = array_rand($request->teams, 2);
            $request->session()->put('stepThreeTeams',  [$request->teams[$randomKeys[0]], $request->teams[$randomKeys[1]]]);
            return redirect()->route('tournament.stepFour');
        } catch (Exception $e) {
            return redirect()->back()->with('ExceptionError', $e->getMessage());
        }
    }

    public function stepFourShow(Request $request)
    {
        try{
            $winners = $request->session()->get('stepThreeTeams');
            return view('step-4', compact('winners'));
        } catch (Exception $e) {
            return redirect()->back()->with('ExceptionError', $e->getMessage());
        }
    }

    public function stepFourSave(Request $request)
    {
        try{
            $randomKeys = array_rand($request->teams, 1);
            $request->session()->put('stepFourTeams',  [$request->teams[$randomKeys]]);
            return redirect()->route('tournament.stepFive');
        } catch (Exception $e) {
            return redirect()->back()->with('ExceptionError', $e->getMessage());
        }
    }

    public function stepFiveShow(Request $request)
    {
        try{
            $winners =  $request->session()->get('stepFourTeams');
            Session::flush();
            return view('step-5', compact('winners'));
        } catch (Exception $e) {
            return redirect()->back()->with('ExceptionError', $e->getMessage());
        }
    }
}
