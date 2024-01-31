<?php
// Include the configuration file
include('db_connect.php');

?>
<div class="container">
    <h4 class="text-center">Account Ledger Creation</h4>
    <form action="saveledger.php" name="frmacct" id="frmacct" method="POST" autocomplete="off">
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-6 col-xxl-6">
                <div class="mb-3 head">
                    <div class="input-div">
                        <label for="ac_nam">A/c Ledger Name</label>
                        <input type="text" class="form-control" id="ac_nam" name="ac_nam" autocomplete="off" style="text-transform: uppercase;" onkeydown="handleEnterKey(event, 'grpnames')">
                    </div>
                    <div class="input-div">
                        <label for="grpnames">Under Group</label>
                        <input class="form-control" list="grpname" id="grpnames" name="grpnames" placeholder="Type to search..." onkeydown="handleEnterKey(event, 'ac_op_bal')">
                        <datalist id="grpname" class="bold-datalist">
                          
                            <?php
                            $sql = mysqli_query($conn, "SELECT (id) as grpid, trim(group_name) as grpnam FROM ac_groups ORDER BY grpnam");
                            while ($row = $sql->fetch_assoc()) {
                                echo "<option value='" . $row['grpnam'] . "' data-grpid='" . $row['grpid'] . "'>";
                            }
                            ?>
                        </datalist>
                    </div>
                    <div class="input-div">

                        <label for="ac_op_bal">Opening Balance</label>
                        <div class="input-group">
                            <input type="number" style="width:80% !important;" class="form-control" id="ac_op_bal" name="ac_op_bal" onkeydown="handleEnterKey(event, 'gst')">
                            <select style="width:20% !important;" class="form-control" id="count" name="count">
                                <option value="dr">DR</option>
                                <option value="cr">CR</option>
                            </select>
                        </div>

                    </div>
                    <hr>
                </div>
                <div class="input-div ">
                    <label for="gst">GSTIN</label>
                    <input type="text" class="form-control" id="gst" name="gst" onblur="searchGSTIN()" style="text-transform: uppercase;" onkeydown="handleEnterKey(event, 'pan')">
                </div>
                <div class="input-div ">
                    <label for="pan">PAN</label>
                    <input type="text" class="form-control" id="pan" name="pan" style="text-transform: uppercase;" onkeydown="handleEnterKey(event, 'bank_acname')">
                </div>
                <div class="input-div">
                    <label for="bank_acname">Bank A/c Name</label>
                    <input type="text" class="form-control" id="bank_acname" name="bank_acname" onkeydown="handleEnterKey(event, 'bank_acno')">
                </div>
                <div class="input-div">
                    <label for="bank_acno">Bank A/c No</label>
                    <input type="number" class="form-control" id="bank_acno" name="bank_acno" onkeydown="handleEnterKey(event, 'ifsc')">
                </div>
                <div class="input-div">
                    <label for="ifsc">Bank IFSC</label>
                    <input type="text" class="form-control" id="ifsc" name="ifsc" style="text-transform: uppercase;" onkeydown="handleEnterKey(event, 'bank_name')">

                </div>
                <div class="input-div">
                    <label for="bank_name">Bank Name</label>
                    <input type="text" class="form-control" id="bank_name" name="bank_name" onkeydown="handleEnterKey(event, 'bank_brnch')">
                </div>
                <div class="input-div">
                    <label for="bank_brnch">Bank Branch</label>
                    <input type="text" class="form-control" id="bank_brnch" name="bank_brnch" onkeydown="handleEnterKey(event, 'ac_cr_limt')">
                </div>
                <div class="input-div">
                    <label for="ac_cr_limt">Max-Credit Limit</label>
                    <input type="number" class="form-control" id="ac_cr_limt" name="ac_cr_limt" onkeydown="handleEnterKey(event, 'ac_cr_days')">
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xxl-6 ">
                <div class="input-div">
                    <label for="ac_cr_days">Credit Days</label>
                    <input type="number" class="form-control" id="ac_cr_days" name="ac_cr_days" onkeydown="handleEnterKey(event, 'billwise')">
                </div>
                <div class="input-div ">

                    <label for="billwise">Billing-wise</label>
                    <select class="form-control" id="billwise" name="billwise" onkeydown="handleEnterKey(event, 'forme')">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>

                </div>
                <div class="input-div">
                    <label for="forme">Print Name</label>
                    <input type="text" class="form-control" name="forme" id="forme" onkeydown="handleEnterKey(event, 'add1')">
                </div>
                <div class="input-div">
                    <label for="add1">Address</label>
                    <textarea class="form-control" rows="1" name="add1" id="add1" onkeydown="handleEnterKey(event, 'location')"></textarea>
                </div>
                <div class="input-div">
                    <label for="location">Location</label>
                    <input type="text" id="location" class="form-control" name="location" onkeydown="handleEnterKey(event, 'area')">
                </div>
                <div class="input-div">
                    <label for="area">area</label>
                    <input type="text" id="area" class="form-control" name="area" onkeydown="handleEnterKey(event, 'pin')">
                </div>
                <div class="input-div">
                    <label for="pin">Pincode</label>
                    <input type="number" name="pin" id="pin" class="form-control" onkeydown="handleEnterKey(event, 'cell-no')">
                </div>
                <div class="input-div">
                    <label for="cell-no">Cell No</label>
                    <input type="text" class="form-control" name="cell-no" id="cell-no" onkeydown="handleEnterKey(event, 'contact-no')">
                </div>
                <div class="input-div">
                    <label for="contact-no">Contact No</label>
                    <input type="text" class="form-control" name="contact-no" id="contact-no" onkeydown="handleEnterKey(event, 'email-id')">
                </div>
                <div class="input-div">
                    <label for="email-id">Email Id</label>
                    <input type="text" class="form-control" name="email-id" id="email-id" onkeydown="handleEnterKey(event, 'person_name')">
                </div>
                <div class="input-div">
                    <label for="person_name">Contact Person</label>
                    <input type="text" class="form-control" name="person_name" id="person_name" onkeydown="handleEnterKey(event, 'person_cell')">
                </div>
                <div class="input-div">
                    <label for="person_cell">Contact person's No</label>
                    <input type="number" class="form-control" name="person_cell" id="person_cell" onkeydown="handleEnterKey(event, 'save')">

                </div>
            </div>

        </div>
        <!-- The Modal -->
        <div class="modal " id="yModal">

            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" onclick="funclose()" class="btn-close ms-auto p-3 "></button>
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4>Search name</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-div">
                            <input class="form-control" list="acname" id="acnames" name="acnames" placeholder="Type to search...">
                            <datalist id="acname">
                              
                                <?php

                                $sql = mysqli_query($conn, "SELECT id, ac_name FROM accts WHERE cmp_id=1 ORDER BY ac_name");
                                while ($row = $sql->fetch_assoc()) {

                                    echo "<option value='" . $row['ac_name'] . "' data-acid='" . $row['id'] . "'></option>";
                                }
                                ?>
                            </datalist>


                        </div>
                        <button name="Display" id="Display" class="btn btn-primary" type="button" onclick="fundisplay()">Display</button>

                    </div>

                    <!-- Modal footer -->


                </div>
            </div>
        </div> <!---modal End-->
        <div class="buttons">

            <div>
                <button type="sumbit" name="save" id="save" class="btn-save" onclick="formsave()">
                    Save
                </button>
                <a href="home.php"><button type="button" name="home" class="btn-new">
                        Home
                    </button></a>
                <button type="reset" name="reset" class="btn-new">
                    Reset
                </button>
                <button type="button" onclick="funedit()" class="btn-edit">
                    Edit
                </button>
            </div>

            <!-- <div class="btnh1"><button type="reset" href="home.php" class="btn-home">Reset</button></div> -->
            <input type="hidden" name="acid" id="acid" value=0>
            <input type="hidden" name="grpid" id="grpid" value=0>
        </div>

    </form>

</div>