// Centralized DataTable initialization helper
(function (window, $) {
  if (!window || !window.jQuery) return;
  const DEFAULT_LENGTHS = [10, 50, 100, 250, 500, -1];
  const DEFAULT_LABELS = [10, 50, 100, 250, 500, "All"];
  const GLOBAL_KEY = "dt_global_length";
  function resolveLength(key) {
    let stored = parseInt(localStorage.getItem(key) || "10");
    if (![10, 50, 100, 250, 500].includes(stored)) stored = 10;
    return stored;
  }
  function composeDrawCallback(existing, key) {
    return function () {
      try {
        localStorage.setItem(key, this.api().page.len());
      } catch (e) {}
      if (typeof existing === "function") existing.apply(this, arguments);
    };
  }
  window.initDataTable = function (selector, opts, overrides) {
    overrides = overrides || {};
    const key = overrides.persistLengthKey || GLOBAL_KEY;
    const disableLength = overrides.disableLength === true;
    const baseLen = resolveLength(key);
    const baseConfig = {
      bLengthChange: !disableLength,
      lengthMenu: disableLength ? undefined : [DEFAULT_LENGTHS, DEFAULT_LABELS],
      pageLength: disableLength ? 10 : baseLen,
      dom: opts && opts.dom ? opts.dom : disableLength ? "Bfrtip" : "lBfrtip",
      drawCallback: composeDrawCallback(opts && opts.drawCallback, key),
      responsive: true,
      language: {
        search: "<i class='ti-search'></i>",
        searchPlaceholder: window.jsLang
          ? window.jsLang("search")
          : "Search...",
        paginate: {
          next: "<i class='ti-arrow-right'></i>",
          previous: "<i class='ti-arrow-left'></i>",
        },
      },
      columnDefs: [],
    };
    const $el = $(selector);
    if (!$el.length) return null;
    $el.find("thead th").each(function (idx) {
      const t = $(this).text().trim().toLowerCase();
      if (t === "action" || t === "actions") {
        $(this).addClass("no-search not-export-col");
        $el.find("tbody tr").each(function () {
          $(this).find("td").eq(idx).addClass("no-search not-export-col");
        });
        baseConfig.columnDefs.push({ targets: idx, searchable: false });
      }
    });
    if (opts && opts.columnDefs) {
      baseConfig.columnDefs = baseConfig.columnDefs.concat(opts.columnDefs);
    }
    const finalConfig = $.extend(true, {}, baseConfig, opts || {});
    return $el.DataTable(finalConfig);
  };
  // Apply global defaults so legacy inline initializations get unified length menu & persistence
  try {
    if ($.fn.dataTable) {
      const key = GLOBAL_KEY;
      const baseLen = resolveLength(key);
      const existing = $.fn.dataTable.defaults || {};
      const existingDraw = existing.drawCallback;
      // Only augment once
      if (!existing.__dtGlobalAugmented) {
        $.extend(true, $.fn.dataTable.defaults, {
          lengthMenu: existing.lengthMenu || [DEFAULT_LENGTHS, DEFAULT_LABELS],
          pageLength: existing.pageLength || baseLen,
          dom: existing.dom
            ? existing.dom.includes("l")
              ? existing.dom
              : "l" + existing.dom
            : "lBfrtip",
          drawCallback: composeDrawCallback(existingDraw, key),
          __dtGlobalAugmented: true,
        });
      }
    }
  } catch (e) {}
})(window, jQuery);
