<?php

namespace App\Controllers\User\Event;

use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\EventTypeModel;
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
        
        $data['events'] = $this->eventModel->join('event_types', 'event_types.event_type_id = events.event_type_id' )->findAll();
        return view("user/event/events", $data);
    }

    public function show($id = null)
    {
        $data = $this->eventModel->find($id);
        return view("user/event/show_event", $data);
    }

    public function new()
    {
        helper(['form']);
        $eventTypeModel = new EventTypeModel();
        $data['event_types'] =  $eventTypeModel->findAll();
        return view('user/event/create_event', $data);
    }

    public function create()
    {
        helper(['form']);
        $rules = [
            'eventname'         => 'required|min_length[5]|max_length[50]|alpha_numeric_punct',
            'description'       => 'required|min_length[15]|max_length[200]|alpha_numeric_punct',
            'startdate'         => 'required',
            'enddate'           => 'required',
            'event_address1'    => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'event_address2'    => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'event_street'      => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'event_city'        => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'event_state'       => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'event_country'     => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'event_type'        => 'required'

        ];
        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            $eventTypeModel = new EventTypeModel();
            $data['event_types'] =  $eventTypeModel->findAll();
            echo view('user/event/create_event', $data);
        }
        $data = [
            'event_name'        => $this->request->getVar('eventname'),
            'description'       =>trim($this->request->getVar( 'description')),
            'start_date'        =>$this->request->getVar( 'startdate'),
            'end_date'          =>$this->request->getVar( 'enddate'),
            'created_by'        => session()->get('user_id'),
            'location_address1' => $this->request->getVar( 'event_address1'),
            'location_address2' => $this->request->getVar( 'event_address2'),
            'location_street'   => $this->request->getVar( 'event_street'),
            'location_city'   => $this->request->getVar( 'event_city'),
            'location_state'   => $this->request->getVar( 'event_state'),
            'location_country'   => $this->request->getVar( 'event_country'),
            'event_type_id'      => $this->request->getVar( 'event_type'),
        ];
        
        
        $this->eventModel->insert($data);
        
        return redirect()->to('/events');
    }

    public function edit($id = null)
    {
        
        helper(['form']);
        $data['event'] = $this->eventModel->find($id);
        
        $eventTypeModel = new EventTypeModel();
        $data['event_types'] =  $eventTypeModel->findAll();
        return view('user/event/edit_event', $data);
    }

    public function update($id = null)
    {
        helper(['form']);
        $rules = [
            'eventname'         => 'required|min_length[5]|max_length[50]|alpha_numeric_punct',
            'description'       => 'required|min_length[15]|max_length[200]|alpha_numeric_punct',
            'startdate'         => 'required',
            'enddate'           => 'required',
            'event_address1'    => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'event_address2'    => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'event_street'      => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'event_city'        => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'event_state'       => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'event_country'     => 'required|min_length[3]|max_length[50]|alpha_numeric_punct',
            'event_type'        => 'required'

        ];
        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            
            echo view('user/event/edit_event', $data);
        }
        $data = [
            'event_name'        => $this->request->getVar('eventname'),
            'description'       =>$this->request->getVar( 'description'),
            'start_date'        =>$this->request->getVar( 'startdate'),
            'end_date'          =>$this->request->getVar( 'enddate'),
            'created_by'        => session()->get('user_id'),
            'location_address1' => $this->request->getVar( 'event_address1'),
            'location_address2' => $this->request->getVar( 'event_address2'),
            'location_street'   => $this->request->getVar( 'event_street'),
            'location_city'   => $this->request->getVar( 'event_city'),
            'location_state'   => $this->request->getVar( 'event_state'),
            'location_country'   => $this->request->getVar( 'event_country'),
            'event_type_id'      => $this->request->getVar( 'event_type'),
            
        ];
        dd($data);
        $this->eventModel->where('event_id', $id)->set($data)->update();
        return redirect()->to("/events/{$id}");

    }

    public function delete($id = null)
    {
        
        $this->eventModel->delete($id);
        return redirect()->to("/events");
    }
}
