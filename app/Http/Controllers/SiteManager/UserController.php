<?php 
namespace App\Http\Controllers\Sitemanager;

use App\Web\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
	public function __construct(Request $request, User $user)
    {
        parent::__construct();
        $this->moduleUrl    = $this->baseUrl('user');
        $this->baseTemplate = $this->template('user');
        $this->request      = $request;
        $this->user         = $user;

        view()->share([
            'baseUrl'     => $this->baseUrl(),
            'moduleUrl'   => $this->moduleUrl,
            'moduleTitle' => $this->moduleTitle = 'User'
        ]);
    }

    public function index()
    {
    	$user = $this->user->paginate(10);
    	return $this->template('index', compact('user'));
    }

    public function create()
    {
        return $this->form();
    }

    public function postCreate()
    {
        return $this->save();
    }

    public function edit($id)
    {
        return $this->form($id);
    }

    public function postEdit($id)
    {
        return $this->save($id);
    }

    public function form($id = null)
    {
        $edit = false;
        
        if($id){
            $edit = true;
            $user = $this->user->find($id);
            session()->flash('_old_input', $user);
        }

        $listLevel = config('sitemanager.level');
        return $this->template('form', compact('listLevel', 'edit'));
    }

    public function save($id = null)
    {
        if($id) {
            $user = $this->user->find($id);
        }else{
            $user = new $this->user;
        }

        $this->validate($this->request, [
            'name'     => 'required',
            'username' => 'required|unique:users,username' . ( !$id ? '' : ',' . $id),
            'email'    => 'required|email|unique:users,email' . ( !$id ? '' : ',' . $id),
            'password' => 'confirmed' . ( $id ? '' : '|required')
        ]);

        $input = $this->request->all();

        $user->name     = $input['name'];
        $user->username = $input['username'];
        $user->email    = $input['email'];
        $user->level    = $input['level'];
        
        if(!empty($input['password'])){
            $user->password = bcrypt($input['password']);
        }

        $user->save();

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' "'.$user->name.'" telah disimpan', false);

        return redirect(url($this->moduleUrl));
    }

    public function delete($id)
    {
        $user = $this->user->find($id);

        $user->delete();

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' "'.$user->name.'" telah dihapus', false);

        return redirect(url($this->moduleUrl));
    }

    public function getChangePassword()
    {
        $moduleTitle = 'Change Password';
        return $this->template('change-password', compact('moduleTitle'));
    }

    public function postChangePassword()
    {
        $user = app('auth')->user();

        $this->validate($this->request, [
            'old_password' => 'required',
            'password'     => 'required|confirmed'
        ]);

        $checkOld = \Hash::check(request('old_password'), $user->password);

        if(!$checkOld) return redirect()->back()->withErrors(['old' => 'Password Lama Anda salah']);

        $user->password = bcrypt(request('password'));
        $user->save();

        flash_message('message', 'success', 'check', 'Password anda telah diupdate', false);

        return redirect()->back();
    }

}