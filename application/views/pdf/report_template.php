<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        th { background-color: #10A182; color: white; }
    </style>
</head>
<body>

<h2><?= $title ?></h2>

<table>
    <thead>
        <tr>
            <th>Sl. No</th>
            <th>Name</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($report_data)): ?>
            <?php foreach ($report_data as $i => $row): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                   <td><?= $row->name ?></td>
                    <td><?= $row->date ?></td>
                    <td><?= $row->status ?></td>

                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No data available</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
