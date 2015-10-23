(function () {
  'use strict';

  function scheduleButton() {
     $("[data-toggle=popover]")
      .popover({
        html : true,
        animation: false,
        content: function() {
          var content = $(this).attr("data-popover-content");
          return $(content).children(".popover-body").html();
        },
        title: function() {
          var title = $(this).attr("data-popover-content");
          return $(title).children(".popover-heading").html();
        }
      })
      .on("click", function() {
        $(".schedule-content-block .popover").removeClass("step-2 step-3 step-4");

        $('#datetimepickerDate').datetimepicker({
          format: 'DD/MM/YYYY',
          icons: {
            previous: 'icon-chevron-left',
            next: 'icon-chevron-right'
          }
        });

        $('#datetimepickerTime').datetimepicker({
            format: 'LT',
            icons: {
              up: 'icon-chevron-up',
              down: 'icon-chevron-down'
            }
        });

        $('.selectpicker').selectpicker({
          dropupAuto: false
        });
      });


      $('html').on("click", ".popover .close-btn", function(e) {
          $("[data-toggle=popover]").trigger('click');
      });
  }

  $('.selectpicker').selectpicker({
    dropupAuto: false
  });

  function scheduleSteps() {
    $('html').on("click", ".find-park-btn", function() {
      $(".schedule-content-block .popover").addClass("step-2");
    });
    $('html').on("click", ".schedule-step3", function() {
      $(".schedule-content-block .popover").removeClass("step-2").addClass("step-3");
    });
    $('html').on("click", ".schedule-step4", function() {
      $(".schedule-content-block .popover").removeClass("step-3").addClass("step-4");
    });
  }

  function toggleCollapseIcon(e) {
    $(e.target)
      .prev('.panel-heading')
      .find("i.indicator")
      .toggleClass('icon-plus icon-minus');
  }
  $('#faq-accordion').on('hidden.bs.collapse', toggleCollapseIcon);
  $('#faq-accordion').on('shown.bs.collapse', toggleCollapseIcon);

  function hideAllSubmenus (_callback) {
    // -> first hide all submenus
    var menus = $("header nav .menu-menu-header-container > ul > li > a"),
        submenus = $("header nav .menu-menu-header-container > ul > li > .sub-menu");

    if (menus.hasClass('active-menu')) {
      menus.removeClass('active-menu');
    }
    if (submenus.hasClass('active-submenu')) {
      submenus.removeClass('active-submenu');
    }

    _callback();
  }

  function computeLeftMarginForItem (el, _callback) {
    // -> then compute left position for submenu (except for first submenu)
    if (el && !$(el).parent().is(":first-child")) {
      $(el).siblings('.sub-menu').css('left', $(el).position().left);
    }
    _callback();
  }

  function toggleCurrentSubmenu (el) {
    if( $(el).hasClass('active-menu') ) {
      $(el).removeClass('active-menu');
      $(el).siblings('.sub-menu').removeClass('active-submenu');
    } else {
      hideAllSubmenus(function () {
        computeLeftMarginForItem(el, function () {
          // -> now show my submenu
          $(el).addClass('active-menu');
          $(el).siblings('.sub-menu').addClass('active-submenu');
        });
      });
    }

  }

  function injectGetUpdatesInSubmenu() {
    var menuItem = $("header nav .menu-menu-header-container > ul > .get-updates");

    if (menuItem) {
      menuItem.children(".sub-menu").append(""+
        "<li class=\"get-updates-quickly\">"+
            "<div>"+
              "<p>Get updates quickly</p>"+
              "<p class=\"small\">Sign up for email notification of news releases.</p>"+
              "<button type=\"button\" class=\"btn red-btn small-btn\">Sign Up for investor news</button>"+
            "</div>"+
          "</li>"+
      "");
    }
  }

  var menuType;
  function changeMenuBehaviourIfNecessary () {
    var menus = $("header nav .menu-menu-header-container > ul > li > a"),
        submenus = $("header nav .menu-menu-header-container > ul > li > .sub-menu");

    menus.on('mouseover', function (ev) {
        computeLeftMarginForItem(this, function(){});
    });

    if ($(window).width() < 768) {
      if (!menuType || menuType !== 'hamburger') {
        menuType = 'hamburger';
        menus.on('click', function (ev) {
            toggleCurrentSubmenu(this);
        });
        submenus.css("left", 0);
      }
    } else {
      if (!menuType || menuType !== 'normal') {
        menus.off('click'); // we don't need click listener for bigger screens
        menuType = 'normal';
      }
    }
  }

  function computeSameHeightColumns() {
    if ($('.same-height-column').length) {
      $(".same-height-container").map(function (containerIndex) {
        var container = $(this),
          containerWidth = container.outerWidth(),
          columns = container.find('.same-height-column'),
          columnsWidth = columns.outerWidth(),
          columnsMarginLeft,
          nrOfColumnsPerRow,
          nrOfColumns = columns.length,
          row = 0,
          newRow = 0,
          heights = [],
          maxRowHeight,
          leftIndex,
          rightIndex;

        columnsMarginLeft = parseInt(columns.css('marginLeft'));
        nrOfColumnsPerRow = Math.floor(containerWidth / (columnsWidth + columnsMarginLeft));

        columns.map(function (columnIndex) {
          row = newRow;

          newRow = Math.floor(columnIndex / nrOfColumnsPerRow);
          if (newRow != row || columnIndex == nrOfColumns - 1) {
            maxRowHeight = Math.max.apply(null, heights);

            if (newRow != row) { //new row
              leftIndex = columnIndex - nrOfColumnsPerRow;
              rightIndex = columnIndex - 1;
            } else { //last element
              leftIndex = columnIndex - (columnIndex % nrOfColumnsPerRow);
              rightIndex = columnIndex;
            }

            for (var i = leftIndex; i <= rightIndex; i++) {
              columns.eq(i).css('height', maxRowHeight);
            }
            heights = [];
          }
          heights.push($(this).outerHeight());
        });
      });
    }
  }

  function fixIESliderHeight() {
    var sliderCell = $(".computeIEHeight");
    if(sliderCell) {
      var sliderCellSibling = sliderCell.siblings('.table-cell'),
          siblingHeight = sliderCellSibling.outerHeight();

      sliderCell.find('.inner-slideshow').css('height', siblingHeight);
    }
  }

  function checkIEmethods() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE");

    if (msie > 0) {
      fixIESliderHeight();
    }
  }

  $(document).ready(function () {
    computeSameHeightColumns();
    injectGetUpdatesInSubmenu();
    changeMenuBehaviourIfNecessary();
    scheduleButton();
    scheduleSteps();
    checkIEmethods();

    $( window ).resize(function() {
      changeMenuBehaviourIfNecessary();
    });

    $('#nav-icon').click(function(){
      $(this).toggleClass('open');
      $(".nav-holder").toggleClass("open");
    });



    function initializeGmaps() {
      var loc,
          map,
          marker,
          infobox,
          newMarkers = [],
          defaultCoords = {lat: 37.856263, long: -122.258961};//san-francisco coords

      if (typeof coords !== 'undefined' && coords.length > 0) {
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 14,
          center: new google.maps.LatLng(coords[0].lat, coords[0].long),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        _.forEach(coords, function (coord, key) {
          loc = new google.maps.LatLng(coord.lat, coord.long);

          marker = new google.maps.Marker({
            map: map,
            position: loc,
            visible: true,
            //icon: iconBase + 'schools_maps.png'//path to the marker image
          });

          newMarkers.push(marker);

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              _.forEach(newMarkers, function (marker) {
                marker.infobox.close();
              });
              newMarkers[i].infobox.open(map, this);
              map.panTo(loc);
            };
          })(marker, key));

          newMarkers[key].infobox = new InfoBox({
            content: coord.desc,
            disableAutoPan: false,
            maxWidth: 150,
            pixelOffset: new google.maps.Size(-140, 0),
            zIndex: null,
            boxStyle: {
              background: 'rgba(0,0,0,0.75)',
              padding: '12px',
              color: '#fff',
              width: "280px"
            },
            closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",//this to be changed to url of our image
            infoBoxClearance: new google.maps.Size(1, 1)
          });
        });

        if (newMarkers.length > 1) {
          var bounds = new google.maps.LatLngBounds();
          for(var i = 0; i < newMarkers.length; i++) {
             bounds.extend(newMarkers[i].getPosition());
          }

          //center the map to the geometric center of all newMarkers
          map.setCenter(bounds.getCenter());
          map.fitBounds(bounds);
        }

        //remove one zoom level to ensure no marker is on the edge.
        //map.setZoom(map.getZoom()-1);

        // set a minimum zoom
        // if you got only 1 marker or all newMarkers are on the same address map will be zoomed too much.
        if(map.getZoom() > 15){
          map.setZoom(15);
        }
      } else {
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: new google.maps.LatLng(defaultCoords.lat, defaultCoords.long),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
      }
    }

    google.maps.event.addDomListener(window, 'load', initializeGmaps);



    $('.carousel').carousel({
      interval: 5000,
      pause: "hover"
    });

    $(".carousel video").on("click", function () {
      if (this.paused) {
        this.play();
      } else {
        var cover = $(this).siblings('.playVideoCover');
        this.pause();
        cover.show();
      }
    });

    $(".carousel .playVideoCover").on("click", function () {
      var cover = $(this),
          index = cover.parent().parent().index(),
          video = cover.siblings('video')[0];

      cover.hide();
      video.play();
      $('.carousel').carousel("pause");

      $(".carousel-indicators li").on("click", function () {
        var clickedIndex = $(this).index();
        if (clickedIndex !== index) {
          video.pause();
          $('.carousel').carousel("cycle");
        }
      });
      return false;
    });

    $(".carousel video").bind("ended", function() {
      var cover = $(this).siblings('.playVideoCover');
      cover.show();

      setTimeout(function () {
        $('.carousel').carousel("cycle");
      }, 1000);
      return false;
    });

    $(".carousel video").bind("pause", function() {
      var cover = $(this).siblings('.playVideoCover');
      cover.show();
      return false;
    });



    $(".person-contact").popover({
      html: true,
      template: ''+
        '<div class="popover" role="tooltip">'+
          '<div class="arrow"></div>'+
          '<h3 class="popover-title"></h3>'+
          '<div class="popover-content"></div>'+
          '<span class="close-popup"></span>'+
        '</div>',
      placement: 'top'
    });

    $('section').on('click', '.close-popup', function () {
      $(this).parent().prev().trigger('click');
    });



    var allowedNrOfSelectedPlaces = 3,
        selectedPlaces = [];

    $('section').on('click', '.select-box', function () {
      var checkbox = $(this).find('input[type=checkbox]');


      if (checkbox.prop('checked')) {
        checkbox.prop('checked', false);
        checkbox.parent().removeClass('selected');
        _.remove(selectedPlaces, function(n){
          return n === checkbox.val();
        });
      } else {
        if ($('.select-box.selected').length >= allowedNrOfSelectedPlaces) {
          alert('Exceeded nr of allowed selected places.');
        } else {
          checkbox.prop('checked', true);
          checkbox.parent().addClass('selected');
          selectedPlaces.push(checkbox.val());
        }
      }

      if ($('.select-box.selected').length > 1) {
        $(".compare").removeClass('disabled');
      } else {
        $(".compare").addClass('disabled');
      }
    });


    $('section').on('click', '.compare', function () {
      if (selectedPlaces.length > 0) {
        $.ajax({
          method: "GET",
          //url: "some.php",
          data: { selectedPlaces: selectedPlaces }
        })
        .done(function( msg ) {
          //alert( "Data Saved: " + msg );
        });
      }
    });


  });
})();
