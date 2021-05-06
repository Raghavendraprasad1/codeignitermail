<?php
defined('BASEPATH') or exit('No Direct script is allowed');

class Export_as_excel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('excel_import_model');

    }

    public function index()
    {
        $this->load->view('export_as_excel');
    }

    public function getExcel()
    {
        $this->load->library('excel');
        $object_excel = new PHPExcel();

        $query = $this->session->userdata("excel_query");
        $data = $this->db->query($query);
        $row_data = $data->result();
        $row_data1 = $data->result_array();

        $object_excel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

        $y = 0;

        $sheetId = $y;
        $object_excel->createSheet(null, $sheetId);
        $object_excel->setActiveSheetIndex($sheetId);
        $object_excel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
        $object_excel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
        $object_excel->getActiveSheet()->getColumnDimension('C')->setWidth(14);
        $object_excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $object_excel->getActiveSheet()->getColumnDimension('E')->setWidth(16);
        $object_excel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
        $object_excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $object_excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $object_excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
        $object_excel->getActiveSheet()->getColumnDimension('J')->setWidth(17.5);

        $styleArray = array(
            'font' => array(
                'bold' => true,
            ),
        );
        $centreAlign = array(
            'text' => array(
                'align' => 'center',
            ),
        );

        $cellValue = $object_excel->getActiveSheet()->getCell('A2')->getValue();
        $object_excel->getActiveSheet()->setCellValue('A1', ' name : Santa report
           email : santa@gmail.com
           contact number : 8009510469
           ');

        $object_excel->setActiveSheetIndex($sheetId)->mergeCells('A1:J5');
        $object_excel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
        $object_excel->getActiveSheet()->getStyle("A1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $object_excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
        $object_excel->getActiveSheet()->getStyle('A7:J7')->applyFromArray($styleArray);
        $object_excel->getActiveSheet()->getStyle('A7:J7')->applyFromArray($centreAlign);

        // end raghu code

        // $object_excel->setActiveSheetIndex(0); // Create new worksheet
        $table_head = array("Id", "Name", "Branch", "Salary", "Age", "Image"); //Set the names of header cells

        $head = 0;
        foreach ($table_head as $value) {
            $object_excel->getActiveSheet()->setCellValueByColumnAndRow($head, 7, $value);
            $head++;
        }

        $body = 9; //Add some data

        foreach ($row_data as $row) {

            $object_excel->getActiveSheet()->setCellValueByColumnAndRow(0, $body, $row->iAppointmentNum);
            $object_excel->getActiveSheet()->setCellValueByColumnAndRow(1, $body, $row->vName);
            $object_excel->getActiveSheet()->setCellValueByColumnAndRow(2, $body, $row->vSantaName);

            $object_excel->getActiveSheet()->setCellValueByColumnAndRow(3, $body, $row->vContactNumber);
            $object_excel->getActiveSheet()->setCellValueByColumnAndRow(4, $body, $row->vEmail);
            $object_excel->getActiveSheet()->setCellValueByColumnAndRow(5, $body, $row->dAppointmentDate);

            $object_excel->getActiveSheet()->setCellValueByColumnAndRow(6, $body, $row->fAppointmentFee);
            $object_excel->getActiveSheet()->setCellValueByColumnAndRow(7, $body, $row->eAppointmentStatus);
            $object_excel->getActiveSheet()->setCellValueByColumnAndRow(8, $body, $row->eAppointmentType);
            $object_excel->getActiveSheet()->setCellValueByColumnAndRow(9, $body, $row->vPreferredLanguage);
            $body++;
        }

        $object_excel_writer = PHPExcel_IOFactory::createWriter($object_excel, 'Excel5'); // Explain format of Excel data
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="statffdetails.xls"');
        $object_excel_writer->save('php://output'); // For automatic download to local computer
        echo "EXPORTED";
    }
}
