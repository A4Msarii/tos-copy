<style type="text/css">
    #usershow:hover {
        background-color: #bfcfe059;
        cursor: pointer;
        border-radius: 35px;
    }

    @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-5px);
            }
            20%, 40%, 60%, 80% {
                transform: translateX(5px);
            }
        }

    .message-count {
/*        position: absolute;*/
        top: -26px;
        right: -1px;
        background-color: #ed4c78;
        color: white;
        border-radius: 117%;
        padding: 3px 15px;
        font-size: x-large;
    font-weight: bold;
    position: relative;
            right: 55px;
            display: inline-block;
            z-index: 1;
            animation: shake 1.5s ease-in-out infinite;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        /* Adjust the font size as needed */
    }
</style>
<a target="_blank" href="<?php echo BASE_URL; ?>Messenger/dist/index.php" data-bs-placement="bottom" title="Send Message" style="float: right;
    position: relative;top: 25px;">
    <span class="message-count msgCount" id="" style="display:none;"></span>

    <!-- <span class="message-count" id="msgCount" style="display: none;"></span> -->
    <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/favicon2.png" style="height: 50px;
    position: absolute;
/*    top: 25px;*/
    right: 85px;">

</a>
