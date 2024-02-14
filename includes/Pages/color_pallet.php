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

        .color-option-m.selected .checkmark {
            display: block;
        }
    </style>




<script>
    function toggleColorDropdownMenu(event) {
        event.stopPropagation(); // Stop the event from reaching the document level
        const dropdown = document.querySelector('.color-dropdown-content-m');
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    }

    function setColor(element, color) {
        const colorMenu = document.querySelector('.color_menu');
        colorMenu.value = color;

        // Remove 'selected' class from all color options
        document.querySelectorAll('.color-option-m').forEach(option => option.classList.remove('selected'));

        // Add 'selected' class to the clicked color option
        const selectedOption = document.querySelector('.color-option-m[style*="background-color: ' + color + '"]');
        if (selectedOption) {
            selectedOption.classList.add('selected');
        }

        // Set the background color of the button
        const btnBack = document.querySelector('.btnBack-m');
        btnBack.style.backgroundColor = color;
    }

    // Add an event listener to the document to close the dropdown when clicking outside of it
    document.addEventListener('click', function (event) {
        const dropdown = document.querySelector('.color-dropdown-content-m');
        if (dropdown.style.display === 'block' && !event.target.closest('.color-dropdown-m')) {
            dropdown.style.display = 'none';
        }
    });
</script>