<?php 
namespace App\Http\Controllers\Sitemanager;

use App\Web\Models\User;
use App\Web\Models\Setting;
use Illuminate\Http\Request;

use Closure, Auth;

class DashboardController extends BaseController
{
	public function __construct(Request $request, User $user)
    {
        parent::__construct();
		$this->request = $request;
		$this->user    = $user;
    }

	public function index()
	{
		$data = [];
		return view('sitemanager.dashboard', compact('data'));
	}
}