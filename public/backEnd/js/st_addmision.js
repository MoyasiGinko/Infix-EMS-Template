var url = $("#STurl").val();
var user_id = $("#_id").val();

$(function () {
  var croppie = null;
  var el = document.getElementById("resize");

  $.base64ImageToBlob = function (str) {
    // extract content type and base64 payload from original string
    var pos = str.indexOf(";base64,");
    var type = str.substring(5, pos);
    var b64 = str.substr(pos + 8);

    // decode base64
    var imageContent = atob(b64);

    // create an ArrayBuffer and a view (as unsigned 8-bit)
    var buffer = new ArrayBuffer(imageContent.length);
    var view = new Uint8Array(buffer);

    // fill the view, using the decoded base64
    for (var n = 0; n < imageContent.length; n++) {
      view[n] = imageContent.charCodeAt(n);
    }

    // convert ArrayBuffer to Blob
    var blob = new Blob([buffer], { type: type });

    return blob;
  };

  $.getImage = function (input, croppie) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        croppie.bind({
          url: e.target.result,
        });
      };
      reader.readAsDataURL(input.files[0]);
      //var file = input.files[0];
      //console.log(file);
    }
  };

  $("#photo").on("change", function (event) {
    $("#LogoPic").modal();
    croppie = new Croppie(el, {
      viewport: {
        width: 200,
        height: 200,
        type: "square",
      },
      boundary: {
        width: 250,
        height: 250,
      },
      enableOrientation: true,
    });
    $.getImage(event.target, croppie);
  });

  $("#upload_logo").on("click", function () {
    // var data = croppie.result('base64', 'original', 'jpeg');

    croppie.result("base64").then(function (base64) {
      // console.log(URL.createObjectURL($.base64ImageToBlob(base64)));

      $("#LogoPic").modal("hide");
      // $('#studentBaseImage').val($.base64ImageToBlob(base64));
      //  var t =$("#profile-pic").attr("src",`${url}/public/frontend/img/profile/1.png`);

      //var url = "{{ url('/demos/jquery-image-upload') }}";

      var formData = new FormData();
      formData.append("logo_pic", $.base64ImageToBlob(base64));
      // This step is only needed if you are using Laravel
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
        },
      });
      $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
          return success;
          // if (data == "success") {
          //     toastr.success('Succsesfully logo picture updated', 'Success');
          //     //$("#profile-pic").attr("src", base64);
          // } else {
          //     //$("#profile-pic").attr("src",`${url}/public/frontend/img/profile/1.png`);
          // }
        },
        error: function (error) {
          toastr.error("Something went wrong ! try again ", "Error");
          // $("#profile-pic").attr("src",`${url}/public/frontend/img/profile/1.png`);
        },
      });
    });
  });

  $(".rotate").on("click", function () {
    croppie.rotate(parseInt($(this).data("deg")));
  });

  $("#LogoPic").on("hidden.bs.modal", function (e) {
    setTimeout(function () {
      croppie.destroy();
    }, 100);
  });
});

// end student

// parent

$(function () {
  var croppie = null;
  var el = document.getElementById("fa_resize");

  $.base64ImageToBlob = function (str) {
    // extract content type and base64 payload from original string
    var pos = str.indexOf(";base64,");
    var type = str.substring(5, pos);
    var b64 = str.substr(pos + 8);

    // decode base64
    var imageContent = atob(b64);

    // create an ArrayBuffer and a view (as unsigned 8-bit)
    var buffer = new ArrayBuffer(imageContent.length);
    var view = new Uint8Array(buffer);

    // fill the view, using the decoded base64
    for (var n = 0; n < imageContent.length; n++) {
      view[n] = imageContent.charCodeAt(n);
    }

    // convert ArrayBuffer to Blob
    var blob = new Blob([buffer], { type: type });

    return blob;
  };

  $.getImage = function (input, croppie) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        croppie.bind({
          url: e.target.result,
        });
      };
      reader.readAsDataURL(input.files[0]);
      //var file = input.files[0];
      //console.log(file);
    }
  };

  $("#fathers_photo").on("change", function (event) {
    $("#FatherPic").modal();
    croppie = new Croppie(el, {
      viewport: {
        width: 200,
        height: 200,
        type: "square",
      },
      boundary: {
        width: 250,
        height: 250,
      },
      enableOrientation: true,
    });
    $.getImage(event.target, croppie);
  });

  $("#FatherPic_logo").on("click", function () {
    croppie.result("base64").then(function (base64) {
      $("#FatherPic").modal("hide");
      //  var t =$("#profile-pic").attr("src",`${url}/public/frontend/img/profile/1.png`);

      //var url = "{{ url('/demos/jquery-image-upload') }}";
      console.log($.base64ImageToBlob(base64).type);

      var formData = new FormData();
      formData.append("fathers_photo", $.base64ImageToBlob(base64));

      // This step is only needed if you are using Laravel
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
        },
      });
      // console.log(t);

      $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
          console.log(data);

          // if (data == "success") {
          //     toastr.success('Succsesfully logo picture updated', 'Success');
          //     //$("#profile-pic").attr("src", base64);
          // } else {
          //     //$("#profile-pic").attr("src",`${url}/public/frontend/img/profile/1.png`);

          // }
        },
        error: function (error) {
          toastr.error("Something went wrong ! try again ", "Error");
          // $("#profile-pic").attr("src",`${url}/public/frontend/img/profile/1.png`);
        },
      });
    });
  });

  $(".rotate").on("click", function () {
    croppie.rotate(parseInt($(this).data("deg")));
  });

  $("#FatherPic").on("hidden.bs.modal", function (e) {
    setTimeout(function () {
      croppie.destroy();
    }, 100);
  });
});

// end parent

// moather

$(function () {
  var croppie = null;
  var el = document.getElementById("ma_resize");

  $.base64ImageToBlob = function (str) {
    // extract content type and base64 payload from original string
    var pos = str.indexOf(";base64,");
    var type = str.substring(5, pos);
    var b64 = str.substr(pos + 8);

    // decode base64
    var imageContent = atob(b64);

    // create an ArrayBuffer and a view (as unsigned 8-bit)
    var buffer = new ArrayBuffer(imageContent.length);
    var view = new Uint8Array(buffer);

    // fill the view, using the decoded base64
    for (var n = 0; n < imageContent.length; n++) {
      view[n] = imageContent.charCodeAt(n);
    }

    // convert ArrayBuffer to Blob
    var blob = new Blob([buffer], { type: type });

    return blob;
  };

  $.getImage = function (input, croppie) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        croppie.bind({
          url: e.target.result,
        });
      };
      reader.readAsDataURL(input.files[0]);
      //var file = input.files[0];
      //console.log(file);
    }
  };

  $("#mothers_photo").on("change", function (event) {
    $("#MotherPic").modal();
    croppie = new Croppie(el, {
      viewport: {
        width: 200,
        height: 200,
        type: "square",
      },
      boundary: {
        width: 250,
        height: 250,
      },
      enableOrientation: true,
    });
    $.getImage(event.target, croppie);
  });

  $("#Mother_logo").on("click", function () {
    croppie.result("base64").then(function (base64) {
      $("#MotherPic").modal("hide");
      //  var t =$("#profile-pic").attr("src",`${url}/public/frontend/img/profile/1.png`);

      //var url = "{{ url('/demos/jquery-image-upload') }}";
      console.log($.base64ImageToBlob(base64).type);

      var formData = new FormData();
      formData.append("mothers_photo", $.base64ImageToBlob(base64));

      // This step is only needed if you are using Laravel
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
        },
      });
      // console.log(t);

      $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
          console.log(data);

          // if (data == "success") {
          //     toastr.success('Succsesfully logo picture updated', 'Success');
          //     //$("#profile-pic").attr("src", base64);
          // } else {
          //     //$("#profile-pic").attr("src",`${url}/public/frontend/img/profile/1.png`);

          // }
        },
        error: function (error) {
          toastr.error("Something went wrong ! try again ", "Error");
          // $("#profile-pic").attr("src",`${url}/public/frontend/img/profile/1.png`);
        },
      });
    });
  });

  $(".rotate").on("click", function () {
    croppie.rotate(parseInt($(this).data("deg")));
  });

  $("#MotherPic").on("hidden.bs.modal", function (e) {
    setTimeout(function () {
      croppie.destroy();
    }, 100);
  });
});

// Gurdian

$(function () {
  var croppie = null;
  var el = document.getElementById("Gu_resize");

  $.base64ImageToBlob = function (str) {
    // extract content type and base64 payload from original string
    var pos = str.indexOf(";base64,");
    var type = str.substring(5, pos);
    var b64 = str.substr(pos + 8);

    // decode base64
    var imageContent = atob(b64);

    // create an ArrayBuffer and a view (as unsigned 8-bit)
    var buffer = new ArrayBuffer(imageContent.length);
    var view = new Uint8Array(buffer);

    // fill the view, using the decoded base64
    for (var n = 0; n < imageContent.length; n++) {
      view[n] = imageContent.charCodeAt(n);
    }

    // convert ArrayBuffer to Blob
    var blob = new Blob([buffer], { type: type });

    return blob;
  };

  $.getImage = function (input, croppie) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        croppie.bind({
          url: e.target.result,
        });
      };
      reader.readAsDataURL(input.files[0]);
      //var file = input.files[0];
      //console.log(file);
    }
  };

  $("#guardians_photo").on("change", function (event) {
    $("#GurdianPic").modal();
    croppie = new Croppie(el, {
      viewport: {
        width: 200,
        height: 200,
        type: "square",
      },
      boundary: {
        width: 250,
        height: 250,
      },
      enableOrientation: true,
    });
    $.getImage(event.target, croppie);
  });

  $("#Gurdian_logo").on("click", function () {
    croppie.result("base64").then(function (base64) {
      $("#GurdianPic").modal("hide");
      //  var t =$("#profile-pic").attr("src",`${url}/public/frontend/img/profile/1.png`);

      //var url = "{{ url('/demos/jquery-image-upload') }}";
      console.log($.base64ImageToBlob(base64).type);

      var formData = new FormData();
      formData.append("guardians_photo", $.base64ImageToBlob(base64));

      // This step is only needed if you are using Laravel
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
        },
      });
      // console.log(t);

      $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
          console.log(data);

          // if (data == "success") {
          //     toastr.success('Succsesfully logo picture updated', 'Success');
          //     //$("#profile-pic").attr("src", base64);
          // } else {
          //     //$("#profile-pic").attr("src",`${url}/public/frontend/img/profile/1.png`);

          // }
        },
        error: function (error) {
          toastr.error("Something went wrong ! try again ", "Error");
          // $("#profile-pic").attr("src",`${url}/public/frontend/img/profile/1.png`);
        },
      });
    });
  });

  $(".rotate").on("click", function () {
    croppie.rotate(parseInt($(this).data("deg")));
  });

  $("#GurdianPic").on("hidden.bs.modal", function (e) {
    setTimeout(function () {
      croppie.destroy();
    }, 100);
  });
});

// Guardian suggestion & auto-fill
$(document).ready(function () {
  var $emailPanel = $("#guardian_email_suggestions");
  var $phonePanel = $("#guardian_phone_suggestions");

  if (!$emailPanel.length && !$phonePanel.length) {
    return;
  }

  var urlBase = $("#url").val();
  if (!urlBase) {
    return;
  }

  var searchUrl = urlBase.replace(/\/$/, "") + "/guardian-search";

  var debounceTimers = { email: null, phone: null };
  var blurTimers = { email: null, phone: null };
  var suggestionCache = { email: [], phone: [] };
  var panels = { email: $emailPanel, phone: $phonePanel };
  var lists = {
    email: $emailPanel.find(".guardian-suggestion-list"),
    phone: $phonePanel.find(".guardian-suggestion-list"),
  };
  var selectedGuardian = null;

  if ($("#parent_id").val()) {
    $("#parent_details").hide();
  }

  function hidePanels(exceptField) {
    $.each(panels, function (field, $panel) {
      if (!exceptField || exceptField !== field) {
        $panel.addClass("d-none");
      }
    });
  }

  function showPanel(field) {
    var $panel = panels[field];
    if ($panel && suggestionCache[field] && suggestionCache[field].length) {
      $panel.removeClass("d-none");
    }
  }

  function clearSelection(showDetails) {
    if (showDetails === void 0) {
      showDetails = true;
    }

    selectedGuardian = null;
    $("#parent_id").val("");
    $("#guardians_email").data("selectedGuardianValue", "");
    $("#guardians_phone").data("selectedGuardianValue", "");

    if (showDetails) {
      $("#parent_details").slideDown(150);
    }

    $("#parent_info #parent_remove").remove();
  }

  function renderParentBadge(guardian) {
    var labelParts = [];
    if (guardian.name) {
      labelParts.push(guardian.name);
    }
    if (guardian.email) {
      labelParts.push(guardian.email);
    }
    if (guardian.phone) {
      labelParts.push(guardian.phone);
    }

    var label = labelParts.length
      ? labelParts.join(" • ")
      : "Existing guardian";
    var $badge = $(
      '<div class="alert primary-btn small parent_remove" id="parent_remove"></div>'
    );
    $badge.append("&times;<strong> Guardian: " + label + "</strong>");

    $("#parent_info #parent_remove").remove();
    $("#parent_info").append($badge);
  }

  function applyGuardianSelection(guardian) {
    if (!guardian) {
      return;
    }

    selectedGuardian = guardian;

    if (guardian.name) {
      $("#guardians_name").val(guardian.name);
    }
    if (guardian.email) {
      $("#guardians_email")
        .val(guardian.email)
        .data("selectedGuardianValue", guardian.email);
    }
    if (guardian.phone) {
      $("#guardians_phone")
        .val(guardian.phone)
        .data("selectedGuardianValue", guardian.phone);
    }
    if (guardian.address) {
      $("#guardians_address").val(guardian.address);
    }
    if (guardian.occupation) {
      $("#guardians_occupation").val(guardian.occupation);
    }
    if (guardian.relation) {
      $("#relation").val(guardian.relation);
    }

    $("#parent_id").val(guardian.id);
    $("#staff_parent").val("");
    $("#parent_details").slideUp(150);
    renderParentBadge(guardian);
    hidePanels();
  }

  function renderSuggestions(field, suggestions) {
    suggestionCache[field] = suggestions;
    var $list = lists[field];
    if (!$list.length) {
      return;
    }

    $list.empty();

    if (!suggestions.length) {
      hidePanels(field);
      return;
    }

    var heading = panels[field] ? panels[field].data("heading") : "";
    if (heading) {
      $('<li class="guardian-suggestion-heading"></li>')
        .text(heading)
        .appendTo($list);
    }

    suggestions.forEach(function (guardian, index) {
      var $item = $("<li></li>");
      var $button = $(
        '<button type="button" class="guardian-suggestion-option"></button>'
      );
      $button.attr("data-field", field);
      $button.attr("data-index", index);

      var displayName = guardian.name || "Guardian";
      $("<span></span>").text(displayName).appendTo($button);

      var metaParts = [];
      if (guardian.email) {
        metaParts.push(guardian.email);
      }
      if (guardian.phone) {
        metaParts.push(guardian.phone);
      }

      if (metaParts.length) {
        var $meta = $('<span class="guardian-suggestion-meta"></span>');
        metaParts.forEach(function (part) {
          $("<span></span>").text(part).appendTo($meta);
        });
        $button.append($meta);
      }

      $item.append($button);
      $list.append($item);
    });

    showPanel(field);
  }

  function executeSearch(field, term) {
    $.getJSON(searchUrl, { query: term, field: field })
      .done(function (response) {
        var data = response && response.data ? response.data : [];
        renderSuggestions(field, data);
      })
      .fail(function () {
        hidePanels(field);
      });
  }

  function handleInput(event) {
    var $input = $(event.currentTarget);
    var field = $input.data("guardianSearchField");
    if (!field) {
      return;
    }

    var term = ($input.val() || "").trim();
    var storedValue = $input.data("selectedGuardianValue") || "";
    if (storedValue && term !== storedValue) {
      clearSelection(true);
    }

    if (term.length < 3) {
      hidePanels(field);
      return;
    }

    clearTimeout(debounceTimers[field]);
    debounceTimers[field] = setTimeout(function () {
      executeSearch(field, term);
    }, 250);
  }

  function handleFocus(event) {
    var field = $(event.currentTarget).data("guardianSearchField");
    if (field) {
      clearTimeout(blurTimers[field]);
      if (suggestionCache[field] && suggestionCache[field].length) {
        showPanel(field);
      }
    }
  }

  function handleBlur(event) {
    var field = $(event.currentTarget).data("guardianSearchField");
    if (field) {
      blurTimers[field] = setTimeout(function () {
        hidePanels(field);
      }, 180);
    }
  }

  $(document).on("click", ".guardian-suggestion-option", function (e) {
    e.preventDefault();
    var field = $(this).data("field");
    var index = $(this).data("index");
    clearTimeout(blurTimers[field]);
    var guardian = suggestionCache[field] && suggestionCache[field][index];
    if (guardian) {
      applyGuardianSelection(guardian);
    }
  });

  $(document).on("click", function (event) {
    if (!$(event.target).closest(".guardian-suggestion-root").length) {
      hidePanels();
    }
  });

  $(document).on("keydown", function (event) {
    if (event.key === "Escape") {
      hidePanels();
    }
  });

  $(document).on("click", "#parent_remove", function () {
    clearSelection(true);
  });

  var $searchInputs = $("[data-guardian-search-field]");
  $searchInputs.on("input", handleInput);
  $searchInputs.on("focus", handleFocus);
  $searchInputs.on("blur", handleBlur);
});
