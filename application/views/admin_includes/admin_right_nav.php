<!-- start alert modal -->
<div class="alert_bg">
    <!-- next alert modal -->
    <div class="alert_box img_prev_modal">
        <div class="alert_header">
            <h4>Preview Image</h4>
        </div>

        <form>
            <div class="alert_body">
                <div class="field text-center">
                    <img id="imgPrv" style="max-height: 300px;">
                    <div id="caption"></div>
                </div>
                <div class="field" style="display: flex;">
                    <input type="text" id="img_link" readonly>
                    <button type="button" class="btn btn-info btn-sm" onclick="copyTextData('img_link')">Copy</button>
                </div>
            </div>
            <div class="alert_footer field text-right">
                <button type="button" class="btn btn-primary btn-sm alert_cancel">&nbsp; OK &nbsp;</button>
            </div>
        </form> 
    </div>
    <!-- next alert modal -->
    <div class="alert_box html_prev_modal">
        <div class="alert_header">
            <h4>Preview Full Details</h4>
        </div>

        <form>
            <div class="alert_body">
                <div class="field text-center">
                    <div id="showFullHtml"></div>
                </div>
            </div>
            <div class="alert_footer field text-right">
                <button type="button" class="btn btn-primary btn-sm alert_cancel">&nbsp; OK &nbsp;</button>
            </div>
        </form> 
    </div>

    <!-- next alert modal -->
    <div class="alert_box text_prev_modal">
        <div class="alert_header">
            <h4>Preview Full Text</h4>
        </div>

        <form>
            <div class="alert_body">
                <div class="field text-center">
                    <textarea id="showFullTxt" rows="10" readonly></textarea>
                </div>
            </div>
            <div class="alert_footer field text-right">
                <button type="button" class="btn btn-info btn-sm" onclick="copyTextData('showFullTxt')">Copy</button>
                <button type="button" class="btn btn-primary btn-sm alert_cancel">&nbsp; OK &nbsp;</button>
            </div>
        </form> 
    </div>
    
</div>
<!-- end alert modal -->


<link rel="stylesheet" type="text/css" href="<?php echo base_api("assets/webinaToastModal/webinajs.css"); ?>">
<script type="text/javascript" src="<?php echo base_api("assets/webinaToastModal/webinajs.js"); ?>"></script>

<script src="<?php echo base_url(); ?>/admin_assets/jquery/admin_common.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.0.2/js/dataTables.fixedColumns.min.js"></script>