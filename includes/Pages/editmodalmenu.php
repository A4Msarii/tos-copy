<style>
        .color-palette {
            display: flex;
            margin-top: 10px;
        }

        /*.color-option {
            width: 20px;
            height: 20px;
            margin-right: 5px;
            cursor: pointer;
        }*/
        .color-dropdown-m {
            position: relative;
            display: inline-block;
        }

        .color-dropdown-content-m {
            display: none;
            position: absolute;
            z-index: 1;
            width: 400px;
            border: 1px solid #E0E0E0;
    box-shadow: 1px 1px 9px 1px #BDBDBD;
    border-radius: 5px;
        }

        .color-option-m {
            width: 20px;
            height: 20px;
            margin-right: 3px;
            cursor: pointer;
            display: inline-block;
            position: relative;
            box-shadow: 1px 1px 6px 0px #80808061;
    border: 1px solid #80808033;
    border-radius: 5px;

        }
        .color-option-m:hover
        {
            width: 25px;
            height: 25px;
        }
        .checkmark-m {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            font-size: x-large;
            font-weight: bold;
            color: white;
        }

        .color-option-m.selected .checkmark-m {
            display: block;
        }
    </style>


<div id="editmodalmenus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalCenterTitle">Edit Menu</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo BASE_URL;?>includes/Pages/editmenudata.php" method="post">
                    <input type="hidden" id="menuidess" name="menuidess">
                    <input type="text" id="menunameess" name="menunameess" class="form-control" style="font-size: large;font-weight: bold;"><br>
                     <div class="color-dropdown-m" id="color-dropdown-m">
                        <button onclick="toggleColorDropdownMenu(event)" type="button" title="Font Background Color" id="btnBack-m" class="dropdown-toggle btn" style="font-weight:bold; font-size:large;border: 1px solid;padding: 0px;"><i class="bi bi-palette" style="font-size:x-large; margin:5px;"></i></button>
                        <div class="color-dropdown-content-m bg-light m-1 colorDropdown" id="color-dropdown-content-m">
                            <div class="container" style="margin-top:10px;">
                                
                                <div class="row justify-content-center m-1">
                                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffd6d6;" onclick="setColorMenu(this, '#ffd6d6')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #d6d6ff;" onclick="setColorMenu(this, '#d6d6ff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffffd6;" onclick="setColorMenu(this, '#ffffd6')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #e5ffcc;" onclick="setColorMenu(this, '#e5ffcc')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffe5cc;" onclick="setColorMenu(this, '#ffe566')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #e5ccff;" onclick="setColorMenu(this, '#e5ccff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffccff;" onclick="setColorMenu(this, '#ffccff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #fff1d6;" onclick="setColorMenu(this, '#fff1d6')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #eeeeee;" onclick="setColorMenu(this, '#eeeeee')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffffff;;" onclick="setColorMenu(this, '#ffffff;')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffadad;" onclick="setColorMenu(this, '#ffadad')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #adadff;" onclick="setColorMenu(this, '#adadff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffffad;" onclick="setColorMenu(this, '#ffffad')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #b2ff66;" onclick="setColorMenu(this, '#b2ff66')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffcc99;" onclick="setColorMenu(this, '#ffcc99')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #cc99ff;" onclick="setColorMenu(this, '#cc99ff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ff99ff;" onclick="setColorMenu(this, '#ff99ff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffe2ad;" onclick="setColorMenu(this, '#ffe2ad')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #e0e0e0;" onclick="setColorMenu(this, '#e0e0e0')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #c0c0c0;;" onclick="setColorMenu(this, '#c0c0c0;')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ff8585;" onclick="setColorMenu(this, '#ff8585')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #8585ff;" onclick="setColorMenu(this, '#8585ff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffff85;" onclick="setColorMenu(this, '#ffff85')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #99ff33;" onclick="setColorMenu(this, '#99ff33')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffb266;" onclick="setColorMenu(this, '#ffb266')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #b266f5;" onclick="setColorMenu(this, '#b266f5')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ff66ff;" onclick="setColorMenu(this, '#ff66ff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffd485;" onclick="setColorMenu(this, '#ffd485')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #bdbdbd;" onclick="setColorMenu(this, '#bdbdbd')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #808080;;" onclick="setColorMenu(this, '#808080;')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ff5c5c;" onclick="setColorMenu(this, '#ff5c5c')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #5c5cff;" onclick="setColorMenu(this, '#5c5cff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffff5c;" onclick="setColorMenu(this, '#ffff5c')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #80ff00;" onclick="setColorMenu(this, '#80ff00')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ff9933;" onclick="setColorMenu(this, '#ff9933')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #9933ff;" onclick="setColorMenu(this, '#9933ff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ff33ff;" onclick="setColorMenu(this, '#ff33ff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffc65c;" onclick="setColorMenu(this, '#ffc65c')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #9e9e9e;" onclick="setColorMenu(this, '#9e9e9e')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #606060;;" onclick="setColorMenu(this, '#606060;')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ff3333;" onclick="setColorMenu(this, '#ff3333')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #3333ff;" onclick="setColorMenu(this, '#3333ff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffff33;" onclick="setColorMenu(this, '#ffff33')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #66cc00;" onclick="setColorMenu(this, '#66cc00')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ff8000;" onclick="setColorMenu(this, '#ff8000')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #7f00ff;" onclick="setColorMenu(this, '#7f00ff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ff00ff;" onclick="setColorMenu(this, '#ff00ff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffb833;" onclick="setColorMenu(this, '#ffb833')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #757575;" onclick="setColorMenu(this, '#757575')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #404040;;" onclick="setColorMenu(this, '#404040;')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ff0000;" onclick="setColorMenu(this, '#ff0000')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #0a0aff;" onclick="setColorMenu(this, '#0a0aff')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffff0a;" onclick="setColorMenu(this, '#ffff0a')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #469900;" onclick="setColorMenu(this, '#469900')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #cc6600;" onclick="setColorMenu(this, '#cc6600')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #6600cc;" onclick="setColorMenu(this, '#6600cc')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #cc00cc;" onclick="setColorMenu(this, '#cc00cc')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #ffa90a;" onclick="setColorMenu(this, '#ffa90a')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #616161;" onclick="setColorMenu(this, '#616161')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option-m" style="background-color: #000000;;" onclick="setColorMenu(this, '#000000;')">
                            <i class="bi bi-check2 checkmark-m"></i>
                        </div>
                    </div>
                </div>
                <hr style="margin:1px;">
                <div class="row justify-content-center" style="width: 100%;margin-left: 0px;margin-right: 0px;">
                <!-- Add more color options as needed -->
                <div class="col-12" style="display: contents;">
                    <input style="margin:5px;margin-left: -30px;height: 30px;width: 30px;" type="color" class="color_menu" name="color">
                    <label style="width: fit-content;margin-right: -40px;margin: 0px;margin-top: 10px;"><i class="bi bi-palette m-1"></i>Color Picker</label>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
                    <hr>


                      
                    <input style="float:right;" type="submit" class="btn btn-success" value="submit">
                </form>
                </div>
                
            </div>
        </div>
    </div>

<script>
    function toggleColorDropdownMenu(event) {
        event.stopPropagation(); // Stop the event from reaching the document level
        const dropdown = document.querySelector('#color-dropdown-content-m');
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    }

    function setColorMenu(element, color) {
        // alert("hello");
        const colorMenu = document.querySelector('.color_menu');
        colorMenu.value = color;
        console.log(color);

        // Remove 'selected' class from all color options
        document.querySelectorAll('.color-option-m').forEach(option => option.classList.remove('selected'));

        // Add 'selected' class to the clicked color option
        const selectedOption = document.querySelector('.color-option-m[style*="background-color: ' + color + '"]');
        if (selectedOption) {
            selectedOption.classList.add('selected');
        }

        // Set the background color of the button
        const btnBack = document.querySelector('#btnBack-m');
        btnBack.style.backgroundColor = color;
    }

    // Add an event listener to the document to close the dropdown when clicking outside of it
    document.addEventListener('click', function (event) {
        const dropdown = document.querySelector('#color-dropdown-content-m');
        if (dropdown.style.display === 'block' && !event.target.closest('#color-dropdown-m')) {
            dropdown.style.display = 'none';
        }
    });
</script>