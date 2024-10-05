<?php

namespace App\Controllers\User\Event;

use App\Controllers\BaseController;
use App\Models\EventModel;
use CodeIgniter\HTTP\ResponseInterface;

class EventController extends BaseController
{
    protected $eventModel ;
    public function __construct(){
        //parent::__construct();

        $this->eventModel = new EventModel();
    }
    public function index()
    {
        
        $data['events'] = $this->eventModel->findAll();
        return view("user/event/events", $data);
    }

    public function show($id = null)
    {
        $data = $this->eventModel->find($id);
        return view("user/event/show_events", $data);
    }

    public function new()
    {
        helper(['form']);
        return view('user/event/create_event');
    }

    public function create()
    {
        helper(['form']);
        $rules = [
            'eventname'     => 'required|min_length[5]|max_length[50]|alpha_numeric_punct',
            'description'   => 'required|min_length[15]|max_length[200]|alpha_numeric_punct',
            'startdate'     => 'required',
            'enddate'       => 'required',
            'location'      => 'required',

        ];
        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            echo view('user/event/create_event', $data);
        }
        $data = [
            'event_name'    => $this->request->getVar('eventname'),
            'description'   =>$this->request->getVar(index: 'description'),
            'start_date'   =>$this->request->getVar(index: 'startdate'),
            'end_date'   =>$this->request->getVar(index: 'enddate'),
            'created_by'   => session()->get('user_id'),
        ];
        $this->eventModel->save($data);
        return redirect()->to('/events');
    }

    public function edit($id = null)
    {
        helper(['form']);
        $data = $this->eventModel->find($id);
        return view('user/event/edit_event', $data);
    }

    public function update($id = null)
    {
        helper(['form']);
        $rules = [
            'eventname'     => 'required|min_length[5]|max_length[50]|alpha_numeric_punct',
            'description'   => 'required|min_length[15]|max_length[200]|alpha_numeric_punct',
            'startdate'     => 'required',
            'enddate'       => 'required',
            'location'      => 'required',

        ];
        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            echo view('user/event/create_event', $data);
        }
        $data = [
            'event_name'    => $this->request->getVar('eventname'),
            'description'   =>$this->request->getVar(index: 'description'),
            'start_date'   =>$this->request->getVar(index: 'startdate'),
            'end_date'   =>$this->request->getVar(index: 'enddate'),
            
        ];
        $this->eventModel->where('id', $id)->set($data)->update();
        return redirect()->to("/events/{$id}");

    }

    public function delete($id = null)
    {
        $this->eventModel->delete($id);
        return redirect()->to("/events");
    }
}
