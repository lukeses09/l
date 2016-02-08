function set_item()
        {
            alert('marb');
            return();
            var popup_winow = '';

            document.new_sku_form.txt_fill_flag.value = 0;
            
            document.new_sku_form.txt_set_item_data_type.value = data_type;
            document.new_sku_form.txt_set_item_object_name.value = object_name;

            popup_window = window.open("", "set_item_popup", "titlebar=data toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,height=500,width=450,resizable=no");
            document.new_sku_form.action = "../../include/acct/employee_popup.php";
            document.new_sku_form.target = "set_item_popup";
            document.new_sku_form.submit();

            popup_window.focus();

        }