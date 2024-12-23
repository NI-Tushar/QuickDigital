<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Order;
use Illuminate\Http\Request;
use setasign\Fpdi\Tcpdf\Fpdi;
use Illuminate\Support\Facades\Log;

class PDFController extends Controller
{
    /**
     * Create watermark
     */
    public function generatePDF(Request $request, $orderId)
    {
        try {
            // Fetch order details
            $order = Order::findOrFail($orderId);

            // Fetch ebook details
            $ebook = Ebook::findOrFail($order->ebook_id);

            // PDF path from the ebook
            $pdfPath = public_path($ebook->pdf);

            // Check if file exists and is readable
            if (!is_readable($pdfPath)) {
                throw new \Exception("File not readable or does not exist: $pdfPath");
            }

            // Watermark info from order's customer info
            $customerInfo = json_decode($order->customer_info, true);
            $text = "{$customerInfo['name']};{$customerInfo['mobile']};{$customerInfo['email']}";
            $textArr = explode(';', $text);
            $textFinal = "{$textArr[0]} \n {$textArr[1]} \n {$textArr[2]}";

            // Initialize FPDI
            $pdf = new Fpdi();
            $numPages = $pdf->setSourceFile($pdfPath);

            // Traverse all pages
            for ($pageNumber = 1; $pageNumber <= $numPages; $pageNumber++) {
                $y = 100;
                $tplIdx = $pdf->importPage($pageNumber);
                $pdf->AddPage();
                $pdf->useTemplate($tplIdx);
                $pdf->SetFont('Helvetica', '', 16);
                $pdf->SetTextColor(255, 0, 0);
                $pdf->SetXY(0, $y);
                $pdf->MultiCell(0, 10, $textFinal, 0, 'C', false);
            }

            ob_end_clean();
            // Output the PDF
            $pdf->Output('ebook_with_watermark.pdf', 'I'); // Open in browser

        } catch (\Exception $e) {
            // Log error and return a friendly message
            Log::error("Error generating PDF: " . $e->getMessage());
            return response()->json(['error' => 'Failed to generate PDF. Please try again later.'], 500);
        }
    }
}
