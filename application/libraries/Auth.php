<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth {

	var $CI = NULL;

	function __construct()
	{
		$this->CI =& get_instance();		
		// Load additional libraries, helpers, etc.
		$this->CI->load->library('session');
		$this->CI->load->helper('security');
		$this->CI->load->database();
		$this->CI->load->helper('url');
	}

	/**
	 *
	 * Process the data from the login form
	 *
	 * @access	public
	 * @param	array	array with 2 values, username and password (in that order)
	 * @return	boolean
	 */	
	function process_login($login = NULL)
	{
		// A few safety checks
		// Our array has to be set
		if(!isset($login))
			return FALSE;
			
		//Our array has to have 2 values
		//No more, no less!
		if(count($login) != 2)
			return FALSE;
				
		$username = $login[0];
		$password = md5($login[1]);
		//$password = do_hash($password);
		
		// Query time
		$this->CI->db->where('madangnhap', $username);
		$this->CI->db->where('password', $password);
		$query = $this->CI->db->get('user');
        $result = $query->result_array();
        /*
		$newdata = array(
                   'name'  => $result['name'],
                   'id'     => $row->admin_id,
                   'permission'  => $row->admin_permission
             );
             */
		if ($query->num_rows() == 1)
		{
			$row = $query->row(); 
			// Our user exists, set session.
			$newdata = array(
                   'name'  => $row->name,
                   'madangnhap'     => $row->madangnhap,
                   'level'  => $row->level
             );
			$this->CI->session->set_userdata($newdata);
			return TRUE;
		}
		else 
		{
			// No existing user.
			return FALSE;
		}
	}
    
    function exit_email($data){
        $this->CI->db->where(array('madangnhap'=>$data));
        $query = $this->CI->db->get('user');
        return $query->num_rows()>0?true:false;
    }
	
	/**
	 *
	 * This function redirects users after logging in
	 *
	 * @access	public
	 * @return	void
	 */	
	function redirect()
	{
		if ($this->CI->session->userdata('redirected_from') == FALSE)
		{
			redirect(base_url().'index.php?/Cp_admin/data/news');
		} else {
			redirect(base_url().'index.php?'.$this->CI->session->userdata('redirected_from'));
		}
		
	}
	
	/**
	 *
	 * Checks if a user is logged in
	 *
	 * @access	public
	 * @return	boolean
	 */	
	function logged_in()
	{
		if ($this->CI->session->userdata('name') == FALSE)
		{
			return FALSE;
		}
		else 
		{
			return TRUE;
		}
	}
	
	/**
	 *
	 * Logs user out by destroying the session.
	 *
	 * @access	public
	 * @return	TRUE
	 */	
	function logout() 
	{
		$this->CI->session->sess_destroy();
		
		return TRUE;
	}
	
}

/* End of file: Auth.php */
/* Location: ./system/application/libraries/Auth.php */