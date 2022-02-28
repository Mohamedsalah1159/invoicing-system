<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Requests\SectionRequest;
use Illuminate\Support\Facades\Auth;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::selection();
        return view('sections.section', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        //validation is external file in SectionRequest
        
        //insert to DB
            Section::create([
                'section_name' => $request->section_name,
                'descreption' => $request->description,
                'created_by' => (Auth::user())

            ]);
            session()->flash('Add', 'This Section is added succesfully');
            return redirect('bill/sections');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $id = $request->id;
            $this->validate($request, [

                'section_name' => 'required|max:255|unique:sections,section_name,'.$id,
                'description' => 'required',
            ],[
    
                'section_name.required'=> 'this input mustn\'t be empty',
                'section_name.unique' => 'this section is already exists',
                'section_name.max' => 'this input must be less than 100 characters',
                'description.required'=> 'this input mustn\'t be empty'
    
            ]);
            $sections = Section::find($id);
            if($sections){
                $sections->update([
                    'section_name' => $request->section_name,
                    'descreption' => $request->description
                ]);
                return redirect('bill/sections')->with('Add', 'the edit is succsesfuly');
            }

        }catch(\Exception $ex){
            return redirect('bill/sections')->with('Error', 'this is something Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $id = $request->id;
            $sections = Section::find($id);
            if($sections){
                $sections->delete();
                return redirect('bill/sections')->with('Add', 'this section is deleted');

            }
        }catch(\Exception $ex){
            return redirect('bill/sections')->with('Error', 'this is something error');
        }

    }
}
