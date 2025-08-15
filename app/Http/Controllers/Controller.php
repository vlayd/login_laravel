<?php

namespace App\Http\Controllers;

use App\Services\Operations;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

abstract class Controller
{

    public function __construct() {
        define('USER', DB::table('usuarios')->where('id', session('user.id'))->first());
    }

    protected function breadcrumb(array $list)
    {
        $breadcrumb = '<nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                                <li class="breadcrumb-item text-white">
                                    <a class="text-white" href="'.asset('').'">
                                        <i class="fas fa-home text-white text-sm opacity-10"></i>
                                    </a>
                                </li>';
        foreach($list as $item){
            $item1 = 'opacity-5 active';
            $item2 = 'aria-current="page"';
            $item3 = '<h6 class="font-weight-bolder mb-0 text-white">'.$item[0].'</h6>';
            $nome = $item[0];
            if(isset($item[1])){
                $item1 = '';
                $item2 = '';
                $item3 = '';
                $nome = '<a class="text-white" href="'.$item[1].'">'.$item[0].'</a>';
            }
            $breadcrumb.= '<li class="breadcrumb-item text-white '.$item1.'" '.$item2.'>'.$nome.'</li>';
        }
        return $breadcrumb.'</ol>'.$item3.'</nav>';
    }

    protected function decriptId($id)
    {
        $id = Operations::decriptId($id);
        if($id == null || $id == '') return redirect()->route('index');
        else return $id;
    }

    protected function uploadFile($inputFile, $path, $oldFile = '')
    {
        $fileName = time().'.'.$inputFile->extension();
        $inputFile->move(public_path($path), $fileName);
        if(!empty($oldFile)) $this->deleteFile($path, $oldFile);

        return $fileName;
    }

    protected function deleteFile($path, $nome) {
        try{
            if(file_exists($path.'/'.$nome)){
                unlink($path.'/'.$nome);
                return true;
            }
        } catch(\Throwable $e){
            return false;
        }
    }
}
