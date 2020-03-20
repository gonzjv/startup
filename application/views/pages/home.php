<?php if (isset($this->session->email)): ?>
    <div class="row ">
        <div class="col-md-4 text-warning text-center">
            <h3><?php echo $this->session->name . ', you are here!' ?></h3>
        </div>
        <div class="col-md-4">
            <?php echo form_open('login/session_unset'); ?>
            <button type="submit" class="btn btn-outline-info">Quit🌄</button>
        </div>
    </div>
<?php else: ?>

    <?php echo form_open('login'); ?>
    <div class="row mt-md-5">
        <div class="col-md-3">
            <?php
            echo form_label('', 'email');
            $data = array(
                'name' => 'email',
                'class' => 'form-control background',
                'placeholder' => 'Email'
            );
            echo form_input($data);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php
            echo form_label('', 'password');
            $data = array(
                'name' => 'password',
                'class' => 'form-control background',
                'placeholder' => 'Password'
            );
            echo form_input($data);
            ?>
        </div>
    </div>
    <div class="row text-warning">
        <div class="col-md-4">
            <?php echo validation_errors(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="ml-2 mt-4">
                <!--<input type="hidden" name="action" value="reg">-->
                <button type="submit" class="btn btn-outline-warning">Start your journey ✈️</button>
                <?php echo anchor('sign_up', 'or Sign Up', 'class=""'); ?>
            </div>
        </div>
        <div class="col-md-3 mt-4">
        </div>
    </div>
    </form>
<?php endif; ?>
</div>
</div>
</div>