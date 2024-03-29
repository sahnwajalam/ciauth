<?php
class News_model extends CI_Model {
	//edited

        public function __construct()
        {
                $this->load->database();
        }



        public function get_news($slug = NULL)
		{
       		 if ($slug === NULL)
       		 {
                $query = $this->db->get('news');
                return $query->result_array();
        	 }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
		}

		public function set_news()
		{
		    $this->load->helper('url');

		    $slug = url_title($this->input->post('title'),'underscore', TRUE);
		    
		    $data = array(
		        'title' => $this->input->post('title'),
		        'slug' => $slug,
		        'text' => $this->input->post('text')
		    );

		    return $this->db->insert('news', $data);
		}
}

