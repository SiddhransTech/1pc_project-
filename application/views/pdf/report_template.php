<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 20px;
            border: 3px solid #10A182; 
            box-sizing: border-box;
            padding: 15mm;
        }

        .page-break {
            page-break-after: always;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            table-layout: fixed; /* Helps prevent columns from overflowing */
        }

        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
            vertical-align: top;
            word-wrap: break-word;
            word-break: break-word;
        }

        th {
            background-color: #10A182;
            color: white;
        }

        /* Set column widths for better alignment */
        th:nth-child(1), td:nth-child(1) { width: 25%; }     /* Sl. No */
        th:nth-child(2), td:nth-child(2) { width: 50%; }    /* Date */
        th:nth-child(3), td:nth-child(3) { width: 50%; }    /* President */
        th:nth-child(4), td:nth-child(4) { width: 50%; }    /* Area */
        th:nth-child(5), td:nth-child(5) { width: 50%; }    /* Legion */
        th:nth-child(6), td:nth-child(6) { width: 50%; }    /* Program */
        th:nth-child(7), td:nth-child(7) { width: 50%; }    /* Program Area */
        th:nth-child(8), td:nth-child(8) { width: 50%; }    /* Details */

        .title-page {
            text-align: center;
            margin-top: 200px;
        }

        .title-page h1 {
            font-size: 28px;
            color: #10A182;
        }

        .subtitle {
            font-size: 18px;
            margin-top: 20px;
        }

        @media print {
            body {
                margin: 0;
                border: 3px solid #10A182;
                box-sizing: border-box;
                padding: 15mm;
                position: relative;
            }
        }

        @media screen {
            body {
                background: #fff;
            }
        }
    </style>
</head>
<body>

<!-- Title Page -->
<div class="title-page">
    <h1>Senior Chamber International</h1>
    <p class="subtitle"><?= $title ?></p>
</div>

<div class="page-break"></div>

<!-- Table Page -->
<div>
    <h2><?= $title ?></h2>

    <table>
        <thead>
            <tr>
                <th>Sl. No</th>
                <th>Date</th>
                <th>President</th>
                <th>Area</th>
                <th>Legion</th>
                <th>Program</th>
                <th>Program Area</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($report_data)): ?>
                <?php foreach ($report_data as $i => $row): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $row->date ?></td>
                        <td><?= $row->member_name ?></td>
                        <td><?= $row->area_name ?></td>
                        <td><?= $row->legion_name ?></td>
                        <td><?= $row->title ?></td>
                        <td><?= $row->program_area ?></td>
                        <td><?= $row->description ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8">No data available</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
