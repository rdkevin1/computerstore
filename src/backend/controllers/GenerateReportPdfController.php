<?php
require_once "../config/Database.php";
require_once "../libraries/dompdf/autoload.inc.php";
use Dompdf\Dompdf;

class GenerateReportPdfController
{
    private function _build_list($jsonData)
    {
        $array = json_decode($jsonData, true);

        $list = '<ol>';
        foreach ($array as $key => $value) {
            foreach ($value as $key => $index) {
                if (is_array($index)) {
                    $list .= build_list($index);
                } else {
                    $list .= "<li>$index</li>";
                }
            }
        }

        $list .= '</ol>';
        return $list;
    }

    public function GenerateReport()
    {
        $db = new Database();
        $sql = "SELECT name, quantity from tabla301127A_954";

        if ($result = $db->conn->query($sql)) {
            // echo $result->fetch_row();
            // reference the Dompdf namespace
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $data = json_encode($rows, JSON_PRETTY_PRINT);

            $report = $this->_build_list($data);

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($report);
            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');
            // Render the HTML as PDF
            $dompdf->render();
            // Output the generated PDF to Browser
            $dompdf->stream();

        } else {
            return "Error: " . $db->conn->error;
        }

        $db->conn->close();

    }
}
$generateReportPdfController = new GenerateReportPdfController();
$generateReportPdfController->GenerateReport();
