<?php include 'inc/header.php'; ?>
    <div class="container">
        <section class="card">
            <form class="job-post-form" action="searchjob.php" method="get">
                <table style="width: 100%">
                    <tr>
                        <td><strong>Job Title</strong></td>
                        <td>:</td>
                        <td><input type="text" name="title" placeholder="Job Title" required autofocus></td>
                    </tr>
                    <tr>
                        <td><strong>Position</strong></td>
                        <td>:</td>
                        <td>
                            <select name="position">
                                <option value="">Any</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Contract</strong></td>
                        <td>:</td>
                        <td>
                            <select name="contract">
                                <option value="">Any</option>
                                <option value="On-going">On-going</option>
                                <option value="Fixed Term">Fixed Term</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Location</strong></td>
                        <td>:</td>
                        <td>
                            <select name="location">
                                <option value="">Any</option>
                                <option value="ACT">ACT</option>
                                <option value="NSW">NSW</option>
                                <option value="NT">NT</option>
                                <option value="QLD">QLD</option>
                                <option value="SA">SA</option>
                                <option value="TAS">TAS</option>
                                <option value="VIC">VIC</option>
                                <option value="WA">WA</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="float: right">
                            <input class="btn" type="reset" value="Reset">
                            <input class="btn" type="submit" value="Search">
                        </td>
                    </tr>
                </table>
    </div>
<?php include 'inc/footer.php'; ?>