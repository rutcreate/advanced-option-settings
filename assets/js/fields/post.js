/* globals global */
jQuery(function($) {

    var ajaxUrl = advos.ajaxUrl;

    $('.search-autocomplete:not(.processed)').each(function() {
        var $component = $(this);
        var $searchInput = $('<input type="text" class="regular-text" placeholder="Type here to find post." />').css('margin-bottom', '14px').prependTo($component);
        var $hiddenInput = $('<input type="hidden" />').attr('name', $component.data('name')).val($component.data('value')).appendTo($component);
        var $sortableList = $component.find('.sortable');
        var defaultValue = $component.data('value');
        var values = defaultValue ? defaultValue.toString().split(',') : [];
        var maxItems = $component.data('max') ? parseInt($component.data('max')) : 0;

        $component.addClass('processed');

        var updateValues = function() {
            values = $sortableList.sortable('toArray', { attribute: 'data-id' });
            var valuesString = values.join(',');
            $hiddenInput.val(valuesString);
        };

        var checkInputState = function() {
            if (maxItems > 0) {
                if (values.length >= maxItems) {
                    $searchInput.hide();
                } else {
                    $searchInput.show().focus();
                }
            }
        }

        $searchInput.autocomplete({
            minLength: 1,
            source: function(request, response) {
                $.ajax( {
                    url: ajaxUrl,
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        search: request.term,
                        action: 'advos_search_post',
                    },
                    success: function( resp ) {
                        response( resp.data );
                    }
                } );
            },
            select: function(event, ui) {
                var id = ui.item.id.toString();
                var label = ui.item.label;
                if (values.indexOf(id) === -1) {
                    $('<li data-id="' + id + '"><a href="#" class="button button-small remove">&#10007</a> ' + label + '</li>').appendTo($sortableList);
                    $sortableList.sortable('refresh');
                    updateValues();
                    checkInputState();
                }

                setTimeout(function() {
                    $searchInput.val('');
                }, 1);
            }
        });

        $sortableList
        .disableSelection()
        .sortable({
            update: function(event, ui) {
                updateValues();
            }
        });

        $component.on('click', '.remove', function(e) {
            e.preventDefault();
            var $listItem = $(this).parent();
            $listItem.remove();
            updateValues();
            checkInputState();
        });

        checkInputState();

    });

});