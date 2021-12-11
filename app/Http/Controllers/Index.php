<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Log;

class Index extends Controller
{
    
    public function index(Request $request){
        $logs = Log::all();
        return view('index', compact('logs'));
    }
    
    public function monitor(Request $request)
    {
        $text = urlencode($request->text);
        $expected = $request->expected;
        $operation = $request->function;
        $time_start = microtime(true); 
        
        if(empty($text)){
            return response()->json([
                    'error' => true,
                    'parameter' => 'text',
                    'message' => 'Text value is Required'
                ], 200);
        }
        if(empty($expected)){
            return response()->json([
                    'error' => true,
                    'parameter' => 'expected',
                    'message' => 'Expected value is Required'
                ], 200);
        }
        if(empty($operation)){
            return response()->json([
                    'error' => true,
                    'parameter' => 'function',
                    'message' => 'Operation function is Required'
                ], 200);
        }
        if($operation == 'wordcount'){
            $url = "http://wordcount.editor.qpc.hal.davecutting.uk?text=$text";
        }else if($operation == 'charcount'){
            $url = "http://charcount.editor.qpc.hal.davecutting.uk?text=$text";
        }else if($operation == 'commacount'){
            $url = "http://commacount.40283254.qpc.hal.davecutting.uk?text=$text";
        }else if($operation == 'palindrome'){
            $url = "http://palindrome.40283254.qpc.hal.davecutting.uk?text=$text";
        }else if($operation == 'spacecount'){
            $url = "http://spacecount.40283254.qpc.hal.davecutting.uk?text=$text";
        }else if($operation == 'countingvowels'){
            $url = "http://countingvowels.40283254.qpc.hal.davecutting.uk/?text=$text";
        }else{
            return response()->json([
                    'error' => true,
                    'message' => 'Operation function does not exist.'
            ], 404);
        }
        if($url != null){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close ($ch);
            // Further processing ...
            if ($server_output) {
                $time_end = microtime(true);
                $execution_time = ($time_end - $time_start);
                $server_output = json_decode($server_output, true);
                dd($server_output['count']);
                if((!empty($server_output['answer']) && $expected == $server_output['answer']) || (!empty($server_output['count']) && $expected == $server_output['count'])){
                    $server_output['Execution time'] = round($execution_time*1000, 4).' ms';
                    
                    if(!empty($server_output['answer'])){
                        Log::create(['text' => $request->text, 'function' => $operation, 'answer' => $server_output['answer'], 'execution_time' => round($execution_time*1000, 4)]);
                    }
                    if(!empty($server_output['count'])){
                        Log::create(['text' => $request->text, 'function' => $operation, 'answer' => $server_output['count'], 'execution_time' => round($execution_time*1000, 4)]);
                    }
                    return $server_output;
                }else{
                    return ['Payload' => $server_output, 'error' => true, 'message' => 'Expected value not equal return result.', 'Execution time' => round($execution_time*1000, 4).' ms'];
                }
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'An error occurred, please try again later.'
                ], 404);
            }
        }
    }
    
    public function proxy(Request $request) {
        $url = null;
        $text = urlencode($request->text);
        $operation = $request->func;
        $time_start = microtime(true);
        
        if($operation == 'wordcount'){
            $url = "http://wordcount.editor.qpc.hal.davecutting.uk?text=$text";
        }else if($operation == 'charcount'){
            $url = "http://charcount.editor.qpc.hal.davecutting.uk?text=$text";
        }else if($operation == 'commacount'){
            $url = "http://commacount.40283254.qpc.hal.davecutting.uk?text=$text";
        }else if($operation == 'palindrome'){
            $url = "http://palindrome.40283254.qpc.hal.davecutting.uk?text=$text";
        }else if($operation == 'spacecount'){
            $url = "http://spacecount.40283254.qpc.hal.davecutting.uk?text=$text";
        }else if($operation == 'countingvowels'){
            $url = "http://countingvowels.40283254.qpc.hal.davecutting.uk/?text=$text";
        }else{
            return response()->json([
                    'error' => true,
                    'message' => 'Operation function does not exist.'
            ], 404);
        }
        if($url != null){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $server_output = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close ($ch);
            // Further processing ...
            if ($server_output && $httpcode == 200) {
                $time_end = microtime(true);
                $execution_time = ($time_end - $time_start);
                $server_output = json_decode($server_output, true);
                if(!empty($server_output['answer']) || !empty($server_output['count'])){
                    $server_output['Execution time'] = round($execution_time*1000, 4).' ms';
                    if(!empty($server_output['answer'])){
                        Log::create(['text' => $request->text, 'function' => $operation, 'answer' => $server_output['answer'], 'execution_time' => round($execution_time*1000, 4)]);
                    }
                    if(!empty($server_output['count'])){
                        Log::create(['text' => $request->text, 'function' => $operation, 'answer' => $server_output['count'], 'execution_time' => round($execution_time*1000, 4)]);
                    }
                    return $server_output;
                }else{
                    return ['Payload' => $server_output, 'error' => true, 'message' => 'Expected value not equal return result.', 'Execution time' => round($execution_time*1000, 4).' ms'];
                }
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'An error occurred, please try again later.'
                ], 404);
            }
        }
    }
}