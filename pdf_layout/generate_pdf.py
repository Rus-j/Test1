import json
import sys
from PyPDF2 import PdfReader, PdfWriter
from reportlab.pdfgen import canvas
from reportlab.lib.pagesizes import letter
from reportlab.pdfbase import pdfmetrics
from reportlab.pdfbase.ttfonts import TTFont
from reportlab.lib.units import mm
import io


def draw_overlay(data, template_reader):
    overlays = []
    for page_index in range(len(template_reader.pages)):
        packet = io.BytesIO()
        page = template_reader.pages[page_index]
        width = float(page.mediabox.width)
        height = float(page.mediabox.height)
        c = canvas.Canvas(packet, pagesize=(width, height))

        # Example fields for demonstration; real config should come from data
        fields = data.get("fields", [])
        for f in fields:
            if f.get("page", 0) == page_index:
                font = f.get("font", "Helvetica")
                size = f.get("size", 12)
                font_path = f.get("font_path")
                if font_path:
                    pdfmetrics.registerFont(TTFont(font, font_path))
                c.setFont(font, size)
                x = f.get("x", 0) * mm
                y = height - f.get("y", 0) * mm
                c.drawString(x, y, f.get("value", ""))

        # Example repeating transactions
        transactions = data.get("transactions", [])
        if transactions and page_index == 0:
            tx_y_start = 100 * mm
            tx_y_step = 5 * mm
            for i, tx in enumerate(transactions):
                y = tx_y_start - i * tx_y_step
                c.drawString(20 * mm, height - y, tx.get("date", ""))
                c.drawString(40 * mm, height - y, tx.get("memo", ""))
                c.drawRightString(width - 20 * mm, height - y, str(tx.get("amount", "")))

        c.showPage()
        c.save()
        packet.seek(0)
        overlays.append(PdfReader(packet))
    return overlays


def merge(template_path, data, output_path):
    template_reader = PdfReader(template_path)
    writer = PdfWriter()
    overlays = draw_overlay(data, template_reader)
    for i, page in enumerate(template_reader.pages):
        overlay_page = overlays[i].pages[0]
        page.merge_page(overlay_page)
        writer.add_page(page)
    with open(output_path, 'wb') as f_out:
        writer.write(f_out)


def main():
    if len(sys.argv) != 4:
        print("Usage: generate_pdf.py TEMPLATE DATA_JSON OUTPUT")
        return 1
    template = sys.argv[1]
    data_json = sys.argv[2]
    output = sys.argv[3]
    with open(data_json) as f:
        data = json.load(f)
    merge(template, data, output)


if __name__ == "__main__":
    sys.exit(main())
