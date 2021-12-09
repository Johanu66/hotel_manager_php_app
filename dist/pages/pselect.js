function bindPSelectEventsTo(jquery_pselect_label) {
    pselect_remove = jquery_pselect_label.find('.pselect-remove');
    pselect_remove.hover( function() {
        $(this).siblings('.pselect-button').toggleClass('reddish-border');
    }, function() {
        $(this).siblings('.pselect-button').toggleClass('reddish-border');
    });
    
    pselect_remove.click( function(){
      $(this).parent('.pselect-label').remove();
    });
}

function newPSelectObj(...label_names) {

    function formatPSelect(label_name) {
        return '' +
        '<label class="selectgroup-item pselect-label">' +
            '<span class="selectgroup-button pselect-button">' + label_name + '</span>' +
            '<span class="pselect-remove">-</span>' +
        '</label>';
    }

    html = '';
    for (i = 0; i < label_names.length; i++) {
        html += formatPSelect(label_names[i]);
    }
    jquery_obj = $(html);
    bindPSelectEventsTo(jquery_obj);

    return jquery_obj;
}



function bindPSelectFormEventsTo(jquery_pselect_label) {
    bindPSelectEventsTo(jquery_pselect_label);
}

function newPSelectFormObj(name_attr, ...json_label_name_and_value) {
    json_s = json_label_name_and_value;

    function formatPSelectForm(name_attr, label_name, value) {
        return '' +
        '<label class="selectgroup-item pselect-label">' +
            '<input type="hidden" name="' + name_attr + '" value="' + value + '" class="selectgroup-input pselect-input">' +
            '<span class="selectgroup-button pselect-button">' + label_name + '</span>' +
            '<span class="pselect-remove">-</span>' +
        '</label>';
    }

    html = '';
    for (i = 0; i < json_s.length; i++) {
        html += formatPSelectForm(name_attr + '[]', json_s[i][1], json_s[i][0]);
    }
    jquery_obj = $(html);
    bindPSelectFormEventsTo(jquery_obj);

    return jquery_obj;
}


function getAllPselectValuesIn(jquery_obj) {
    list_of_values = [];
    jquery_obj.find('.pselect-input').each(
        list_of_values.push($(this).val())
    );
    return list_of_values
}

function notSelected(selected_values, fetched_list) {
    not_selected = [];
    for (i = 0; i < fetched_list.length; i++) {
        not_selected.push(fetched_list[i]);
        for (j = 0; j < selected_values.length; j++) {
            if (fetched_list[i][1] == selected_values[j]) {
                not_selected.pop();
                break;
            }
        }
    }
    return not_selected;
}

function formatOptions(json_obj) {
    output = '';
    for (i in json_obj) {
        value = json_obj[i][0];
        label_name = json_obj[i][1];
        output += '<option value="' + value + '">' + label_name + '</option>';
    }
    return output;
}


// DEFAULT_OPTION = '<option value="" selected><?php if ($_SESSION['lang'] == 'EN') {echo CHOISIR_SERVICE_LOCATION_CONF_EN;} else {echo CHOISIR_SERVICE_LOCATION_CONF_FR;}?></option>';
// SELECTED_OPTIONS = [];

function bindOptionsEventsTo(json_select, json_pselect_list, list_of_options) {
    json_select.on('change', function() {
        value = $(this).val();
        label_name = $(this).find('option[value="' + value + '"]').text();

        if (value != "") {
            json_pselect_list.append(newPSelectFormObj(name_attr, [value, label_name]));
        }

        selected_values = getAllPselectValuesIn(json_pselect_list);
        not_selected = notSelected(selected_values, list_of_options);
        $(this).html(DEFAULT_OPTION);
        $(this).append(formatOptions(not_selected));
        $(this).val("");
    })
}

function prettySelect(json_select_block, json_pselect_list, list_of_options, DEFAULT_OPTION) {
    select_block = json_select_block;
    select = select_block.find('select');
    pselect = json_pselect_list;

    select.html(DEFAULT_OPTION);
    select.append(formatOptions(list_of_options));
    // list_of_options = function(ajax) {
    //     return ajax.done( function(result) { return result;})
    // }

    bindOptionsEventsTo(select, pselect);



}



// $(document).ready(function(){
//     bindPSelectEventsTo($('.pselect-label'));
// });



