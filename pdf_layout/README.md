# PDF Layout Example

This folder contains a minimal demonstration of how to create dynamic PDF layouts using **PyPDF2** from a PHP script. The `generate_pdf.php` script builds a data set, writes it to a temporary JSON file and calls `generate_pdf.py` via `python3`.

`generate_pdf.py` uses PyPDF2 together with ReportLab to overlay text on a template PDF. Positions are specified in millimetres and can be configured via the JSON payload. The Python script also demonstrates how repeating sections (e.g. transactions) can be drawn dynamically.

## Usage

```
php generate_pdf.php <template.pdf> <output.pdf>
```

Ensure `python3`, `PyPDF2` and `reportlab` are installed in your environment.
