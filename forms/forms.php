<?php
class Forms {
    public function signInForm() {
        echo '
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <input type="submit" value="Submit">
        </form>';
    }
}
?>
