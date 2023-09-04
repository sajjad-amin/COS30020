<?php include 'inc/header.php'; ?>
    <div class="container">
        <div class="card">
            <form class="job-post-form" action="postjobprecess.php" method="post">
                <table style="width: 100%">
                    <tr>
                        <td>Position ID</td>
                        <td>
                            <input class="pid" type="text" name="position_id" placeholder="Position ID" >
                        </td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="title" placeholder="Title" >
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <textarea name="description" rows="5" placeholder="Description" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Closing Date</td>
                        <td>
                            <input type="date" name="closing_date" placeholder="Closing Date" >
                        </td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td>
                            <input type="radio" name="position" value="Full Time" > Full Time
                            <input type="radio" name="position" value="Part Time" > Part Time
                        </td>
                    </tr>
                    <tr>
                        <td>Contract</td>
                        <td>
                            <input type="radio" name="contract" value="On-going" > On-going
                            <input type="radio" name="contract" value="Fixed Term" > Fixed Term
                        </td>
                    </tr>
                    <tr>
                        <td>Application By</td>
                        <td>
                            <input type="checkbox" name="application_by[]" value="Post"> Post
                            <input type="checkbox" name="application_by[]" value="Email"> Mail
                        </td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>
                            <select name="location">
                                <option value="">---</option>
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
                        <td style="float: right">
                            <input type="reset" value="Reset">
                            <input type="submit" value="Post">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>