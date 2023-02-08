<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Exam;

class AdminController extends Controller
{
   //addsubject
   public function addSubject(Request $request)
   {
      try {

         Subject::insert([
            'subject' => $request->subject

         ]);
         return response()->json(['success' => true, 'msg' => 'Subject added Successfully']);

      } catch (\Exception $e) {

         return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
      ;
   }


   //edit subject
   public function editSubject(Request $request)
   {
      try {

         $subject = Subject::find($request->id);
         $subject->subject = $request->subject;
         $subject->save();
         return response()->json(['success' => true, 'msg' => 'Subject upsated Successfully']);

      } catch (\Exception $e) {

         return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
      ;
   }


   //delete subject
   public function deleteSubject(Request $request)
   {
      try {

         Subject::where('id', $request->id)->delete();

         return response()->json(['success' => true, 'msg' => 'Subject deleted Successfully']);

      } catch (\Exception $e) {

         return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
      ;
   }

   //exam subject load
   public function examDashboard()
   {
      // Fetch all subjects from the database
 // Get all the subjects from the database
          $subjects = Subject::all();
          dd($subjects); // Add this statement to check if the data is being set correctly
          return view('your_view', ['subjects' => $subjects]);
   }

   //add exam
   public function addExam(Request $request)
   {
      try {

         Exam::insert([
            'exam_name' => $request->exam_name,
            'subject_id' => $request->esubject_id,
            'date' => $request->date,
            'time' => $request->time
         ]);
         return response()->json(['success' => true, 'msg' => 'Exam Added Successfully']);

      } catch (\Exception $e) {

         return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
      ;
   }
}