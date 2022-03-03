<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SectionRequest;
use App\Models\Section;
use App\Traits\GenralTraits;
use Auth;
use Validator;



class SectionControllerApi extends Controller
{
    use GenralTraits;

    public function create(SectionRequest $request){
        //insert to DB
        $user = Auth::user();
        $user->makeHidden('id');
        $section = Section::create([
            'section_name' => $request->section_name,
            'descreption' => $request->description,
            'created_by' => ($user)
        ]);
        $section->makeHidden('id');
        return $this->returnSuccess(200, 'This section is created' ,'data', $section);

    }
    public function update(Request $request, $id){
        try{
            $id1 = $request->id;

            $validator = Validator::make($request->all(), [

                'section_name' => 'required|max:255|unique:sections,section_name,'.$id1,
                'description' => 'required',
            ],[
    
                'section_name.required'=> 'this input mustn\'t be empty',
                'section_name.unique' => 'this section is already exists',
                'section_name.max' => 'this input must be less than 100 characters',
                'description.required'=> 'this input mustn\'t be empty'
    
            ]);
            if ($validator->fails()) {
                return $this->returnError(422, 'sorry this is have error', 'Errors', $validator->errors());
            }
            $sections = Section::find($id);
            if($sections){
                $sections->update([
                    'section_name' => $request->section_name,
                    'descreption' => $request->description
                ]);
                $sections->makeHidden('id');
                return $this->returnSuccess(200, 'This section successfuly updated', 'data', $sections);
            }else{
                return $this->returnError(422, 'sorry this id not exists');
 
            }

        }catch(\Exception $ex){
            return $this->returnError(422, 'sorry this is an error');
        }
    }
    public function destroy($id){
        try{
            $sections= Section::find($id);
            if($sections){
                $sections->delete();
                return $this->returnSuccess(200, 'This section successfuly Deleted');
            }
            return $this->returnError(422, 'sorry this id not exists');
        }catch(\Exception $ex){
            return $this->returnError(422, 'sorry this is an error');
        }



    }
}
