<?php

namespace App\Http\Controllers;

use App\Services\Batch;
use App\Services\School as SchoolApi;
use App\Services\User as UserApi;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index(Request $request)
    {
        if ($request->session()->has('token')) {
            $user = $request->session()->get('user', null);
            $message = $request->session()->get('message', null);

            if ($user === null) {
                return redirect('/login');
            }

            if ($user['role'] === 'STUDENT') {
                return redirect('/student')->with('message', $message);
            }

            if ($user['role'] === 'TEACHER') {
                return redirect('/teacher')->with('message', $message);
            }

            if ($user['role'] === 'ADMIN') {
                return redirect('/admin')->with('message', $message);
            }
        }

        $data = [
            'message' => $request->session()->get('message'),
        ];

        return view('login.index', $data);
    }

    public function login(Request $request)
    {
        $data = $request->only(['username', 'password']);
        $userApi = new UserApi;
        $response = $userApi->login($data['username'], $data['password']);

        if (!$response['error']) {
            $request->session()->put('token', $response['data']['token']);

            $userApi = new UserApi;
            $responseMe = $userApi->me();
            $request->session()->put('user', $responseMe['data']);

            if ($responseMe['data']['role'] === 'STUDENT') {
                // Mengambil nama sekolah
                $schoolApi = new SchoolApi;
                $responseSchool = $schoolApi->detail($responseMe['data']['userable']['school_id']);
                $responseMe['data']['userable']['school_name'] = $responseSchool['data']['name'];
                $responseMe['data']['userable']['educational_stage'] = $responseSchool['data']['educational_stage'];

                $schoolId = $responseMe['data']['userable']['school_id'];
                $studentGroup = $responseMe['data']['userable']['student_group'];

                $batchApi = new Batch;
                $batch = $batchApi->detail($schoolId, $studentGroup['batch_id']);

                $responseMe['data']['userable']['class_name'] = $studentGroup['name'];
                $responseMe['data']['userable']['entry_year'] = $batch['data']['entry_year'];
                $responseMe['data']['userable']['batch_id'] = $batch['data']['id'];

                // Check foto tersedia dalam directory
                $photo = $responseMe['data']['userable']['photo'];
                $ss = 'HTTP/1.1 200 OK';
                $photoCheck = false;
                if ($photo) {
                    $photoCheck = get_headers($photo);
                }

                $photoExist = $photoCheck !== false ? $photoCheck[0] === $ss : false;
                $responseMe['data']['photoExistCheck'] = $photoExist;

                $response = $userApi->login($responseMe['data']['username'], $responseMe['data']['username']);
                $status = $response['status'] === 200;

                $responseMe['data']['PasswordMustBeChanged'] = $status;
                $responseMe['data']['changePhotoOnBoarding'] = !$photoExist;

                $request->session()->put('user', $responseMe['data']);

                return redirect('/student');
            }

            if ($responseMe['data']['role'] === 'TEACHER') {
                // Mengambil nama sekolah
                $schoolApi = new SchoolApi;
                $responseSchool = $schoolApi->detail($responseMe['data']['userable']['school_id']);
                $responseMe['data']['userable']['school_name'] = $responseSchool['data']['name'];

                // Check foto tersedia dalam directory
                $photo = $responseMe['data']['userable']['photo'];
                $ss = 'HTTP/1.1 200 OK';
                $photoCheck = false;
                if ($photo) {
                    $photoCheck = get_headers($photo);
                }

                $photoExist = $photoCheck !== false ? $photoCheck[0] === $ss : false;
                $responseMe['data']['photoExistCheck'] = $photoExist;

                // Check password sudah diganti
                $response = $userApi->login($responseMe['data']['username'], $responseMe['data']['username']);
                $status = $response['status'] === 200;

                $responseMe['data']['PasswordMustBeChanged'] = $status;
                $responseMe['data']['changePhotoOnBoarding'] = !$photoExist;

                $request->session()->put('user', $responseMe['data']);

                return redirect('/teacher');
            }

            if ($responseMe['data']['role'] === 'ADMIN') {
                $request->session()->put('user', $responseMe['data']);

                return redirect('/admin');
            }
        }

        $request->session()
            ->flash('message', 'Login gagal, mohon periksa kembali username dan password yang digunakan.');

        return redirect('/login');
    }
}
