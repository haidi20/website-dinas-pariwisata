<?php 
namespace App\Http\Controllers\Sitemanager;

use Illuminate\Http\Request;
use App\Web\Models\Inbox;

class InboxController extends BaseController
{
	public function __construct(Request $request, Inbox $inbox)
    {
        parent::__construct();
		$this->moduleUrl    = $this->baseUrl('inbox');
		$this->baseTemplate = $this->template('inbox');
		$this->request      = $request;
		$this->inbox        = $inbox;

        view()->share([
            'baseUrl'     => $this->baseUrl(),
            'moduleUrl'   => $this->moduleUrl,
            'moduleTitle' => $this->moduleTitle = 'Inbox'
        ]);
    }

	public function index()
	{
		$q       = request('q');
		$by      = request('by');
		$perpage = (request('perpage')) ? request('perpage') : 10;

		$inbox   = $this->inbox->type('contact');

		if($by){
			$inbox = $inbox->search($by, $q);
		}

		$total_record = $inbox->count();
		$inbox        = $inbox->sorted('id', 'DESC')->paginate($perpage);

		return $this->template('index', compact('inbox', 'total_record'));
	}

	public function detail($id)
	{
		$inbox = $this->inbox->find($id);
		return $this->template('detail', compact('inbox'));
	}

	public function delete($id)
	{
		$inbox = $this->inbox->find($id);

        $inbox->delete();

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' "'.$inbox->name.'" telah dihapus', false);

        return redirect(url($this->moduleUrl));
	}
}