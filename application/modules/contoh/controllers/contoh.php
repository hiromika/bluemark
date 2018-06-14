<?php

/**
 * Description of user
 *
 * @author hariardi@gmail.com
 */
class Contoh extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
        $this->load->model('m_contoh', '_contoh');
        $this->layout->addStyle('/assets/' . strtolower(__CLASS__) . '/css/style.css');
        $this->layout->addScript('/assets/' . strtolower(__CLASS__) . '/js/jquery.BlockUI.js');
        $this->layout->addScript('/assets/' . strtolower(__CLASS__) . '/js/script.js');
    }

    public function install() {

        $status = true;
        $msg = 'Successfull';

        //tambah table db
        
        $fields = array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'deskripsi' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'status' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('todo');
        
        //nambah navigasi
        add_navigation(__CLASS__, NULL, 'Contoh', '', '/contoh');

        echo json_encode(array("status" => $status, "msg" => $msg));
    }

    public function uninstall() {

        $this->dbforge->drop_table('todo');
        $status = true;
        $msg = "Gagal melakukan proses uninstall";
        if ($status)
            $msg = "Berhasil melakukan uninstall module";
        return array("status" => $status, "msg" => $msg);
    }

    public function index() {
        $this->layout->set_header('Contoh Module');
        $data = $this->_contoh->getData();
        $content = $this->load->view('content', array('data' => $data), true);
        $this->layout->set_content($content);

        $this->layout->render("index", __CLASS__);
    }

    public function tambah() {
        $this->layout->set_header('Contoh Module');
        $content = $this->load->view('tambah', array(), true);
        $this->layout->set_content($content);

        $this->layout->render("index", __CLASS__);
    }

    public function edit($id) {
        $this->layout->set_header('Contoh Module');
        $data = $this->_contoh->getDataById($id);
        $content = $this->load->view('edit', array('id' => $data['id'], 'nama' => $data['nama'], 'deskripsi' => $data['deskripsi']), true);
        $this->layout->set_content($content);

        $this->layout->render("index", __CLASS__);
    }

    public function save() {
        if (strlen($this->input->post('id')) > 0) {
            $this->_contoh->edit($this->input->post());
        } else {
            $this->_contoh->add($this->input->post());
        }

        redirect('/contoh');
    }

    public function delete($id) {
        if ((int) $id == 0) {
            throw new Exception;
        }

        $this->_contoh->delete($id);

        redirect('/contoh');
    }

}
