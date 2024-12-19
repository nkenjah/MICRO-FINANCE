<?php
include("linknice.php");
include("headernice.php");
include("sidebarnice.php");
?>
    <h1>Add Client</h1>
    <form action="manage_client.php" method="POST" class="row g-3">
        <div class="col-12">
            <label for="name" class="form-label">Client Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
            <div class="invalid-feedback">Please enter the client's name.</div>
        </div>

        <div class="col-12">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
            <div class="invalid-feedback">Please enter the phone number.</div>
        </div>

        <div class="col-12">
            <label for="address" class="form-label">Address:</label>
            <textarea id="address" name="address" class="form-control" required></textarea>
            <div class="invalid-feedback">Please enter the address.</div>
        </div>

        <div class="col-12">
            <label for="loan_amount" class="form-label">Loan Amount:</label>
            <input type="number" id="loan_amount" name="loan_amount" class="form-control" step="0.01" required>
            <div class="invalid-feedback">Please enter the loan amount.</div>
        </div>

        <div class="col-12">
            <label for="interest_rate" class="form-label">Interest Rate (%):</label>
            <input type="number" id="interest_rate" name="interest_rate" class="form-control" step="0.01" required>
            <div class="invalid-feedback">Please enter the interest rate.</div>
        </div>

        <div class="col-12">
            <label for="loan_duration" class="form-label">Loan Duration (months):</label>
            <input type="number" id="loan_duration" name="loan_duration" class="form-control" required>
            <div class="invalid-feedback">Please enter the loan duration.</div>
        </div>

        <div class="col-12">
            <label for="collateral" class="form-label">Collateral:</label>
            <textarea id="collateral" name="collateral" class="form-control"></textarea>
        </div>

        <input type="hidden" name="created_by" value="<?php echo $_SESSION['user_id']; ?>"> <!-- Assuming user_id is stored in session -->
        
        <div class="col-12">
            <input type="submit" value="Add Client" class="btn btn-primary">
        </div>
    </form>
<?php
include("footernice.php");
?>