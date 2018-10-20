<form name="contactform" method="post" action="utils/EmailClense.php" id="emailform">
    <table width="450px">
	<h2> Want to buy? Contact us now!</h2>
        <tr>
            <td valign="top">
                <label for="name">Name *</label>
            </td>
            <td valign="top">
                <input type="text" name="name" maxlength="50" size="30">
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label for="email">Email Address *</label>
            </td>
            <td valign="top">
                <input type="text" name="email" maxlength="80" size="30">
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label for="telephone">Telephone Number</label>
            </td>
            <td valign="top">
                <input type="text" name="telephone" maxlength="30" size="30">
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label for="comments">Comments *</label>
            </td>
            <td valign="top">
                <textarea name="comments" maxlength="1000" cols="25" rows="6"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center">
                <input type="submit" value="Submit">
            </td>
        </tr>
    </table>
</form>