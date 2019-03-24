<?php

namespace App\Http\Controllers\Files;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Storage;
use Auth;
use App\Document;

final class FileController extends Controller
{
    	
	public function __construct(){
		$this->middleware('auth:user');
	}
	public function makeDownloadLink(){
		//
		$filename="abc.txt";
		$path=storage_path()."/app/public/Downloads/abc"; //. $filename;
		if(!File::isDirectory($path)){
			$curpath=Storage::makeDirectory("/public/Downloads/abc");
			return (string)$curpath;

		}
		return "not found";

		// $headers = array(
  //           		'Content-Type: txt',
  //           		'Content-Disposition: attachment; filename='.$filename,
  //       	);

		// if (file_exists($path)){
		// 	return \Response::download( $path, $filename, $headers );
		// }else{
		// 	return "Not found";
		// }
	}

	public function createProjectFolder($projectname){
		$path=storage_path()."/app/public/Projects/".$projectname; //. $filename;
		echo $path;
		if(!File::isDirectory($path)){
			$curpath=Storage::makeDirectory("/public/Projects/" . $projectname);
			return (string)$curpath;

		}
		return "Not found";
	}

	public function test(){
		return json_encode(Auth::guard('user')->check());
	}

	public function uploadFiles($projectid, $files){
		$guard=$this->checkGuard();
		foreach ($files as $file) {
	            return $file;
	            
        	}
	}

	public function checkGuard(){
		if(Auth::guard('user')->check()){
			return 'user';
		}else if(Auth::guard('admin')->check()){
			return 'admin';
		}else if(Auth::guard('accountant')->check()){
			return 'accountant';
		}
	}

	public function showUpload(){
		return view('user.project.upload');

	}

	public function fileUpload(Request $request){
		
		$files=$request->file('files');
		foreach ($files as $file) {
			$filename=$file->getClientOriginalName();
			$path=$file->storeAs('/public/Downloads/'.$this->checkGuard(), $filename);
			echo $path;

			$document=new Document();
			$document->filename=$filename;
			$document->filepath=response()->download($path);
			$document->userid=Auth::id();
			$document->usertype=$this->checkGuard();
			$document->catid=1;
			$document->projectid=1;
			$document->save();

		}


		return "success";
		// foreach ($files as $file) {
			
		// }

	}

	public function uploadInvoice(Request $request){
		$files=$request->file('files');
		foreach ($files as $file) {
			$filename=$file->getClientOriginalName();
			$path=$file->storeAs('/public/Downloads/Invoices', $filename);
			echo $path;

			

		}
	}

	public function uploadReceipt(Request $request){
		$files=$request->file('files');
		foreach ($files as $file) {
			$filename=$file->getClientOriginalName();
			$path=$file->storeAs('/public/Downloads/Receipts', $filename);
			echo $path;


		}
	}

}
