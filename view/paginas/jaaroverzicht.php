<h2>Jaaroverzicht</h2>
<table>
    <thead>
        <tr>
            <th>Jaar</th>
            <th>Ledenaantal</th>
            <th>Contributietotaal</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($yearlyOverview as $year) {
                $year_id = htmlspecialchars($year['year_id']);
                $contributionTotal = htmlspecialchars($year['amount']);
                $memberTotal = htmlspecialchars($year['count']);
                
                echo <<<END
                <tr>
                    <td>$year_id</td>
                    <td>$memberTotal</td>
                    <td>&euro; $contributionTotal</td>
                    
                </tr>
                END;
            }
        ?>
    </tbody>
</table>