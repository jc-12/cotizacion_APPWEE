{"version":3,"sources":["../../../js/i18n/defaults-fr_FR.js"],"names":[],"mappings":";;;;;;;;;;;;;;;;;;;;;;;;AAAA,CAAC,QAAQ,CAAC,GAAG,CAAC,CAAC,CAAC;AAChB,EAAE,EAAE,EAAE,CAAC,YAAY,CAAC,QAAQ,CAAC,CAAC,CAAC,CAAC,CAAC;AACjC,IAAI,gBAAgB,CAAC,CAAC,CAAC,MAAM,CAAC,CAAC,CAAC,OAAO,EAAE,CAAC;AAC1C,IAAI,eAAe,CAAC,CAAC,CAAC,KAAK,CAAC,CAAC,CAAC,MAAM,CAAC,IAAI,CAAC,CAAC,CAAC,GAAG,CAAC;AAChD,IAAI,iBAAiB,CAAC,CAAC,QAAQ,CAAC,CAAC,WAAW,CAAC,CAAC,QAAQ,CAAC,CAAC,CAAC,CAAC;AAC1D,MAAM,MAAM,CAAC,CAAC,WAAW,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,EAAE,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,KAAK,CAAC,CAAC,CAAC,QAAQ,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,EAAE,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,IAAI,CAAC,CAAC,CAAC,QAAQ,GAAG,CAAC;AAC1F,IAAI,EAAE,CAAC;AACP,IAAI,cAAc,CAAC,CAAC,QAAQ,CAAC,CAAC,MAAM,CAAC,CAAC,QAAQ,CAAC,CAAC,CAAC,CAAC;AAClD,MAAM,MAAM,CAAC,CAAC,CAAC;AACf,QAAQ,CAAC,MAAM,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,MAAM,CAAC,QAAQ,CAAC,EAAE,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,KAAK,CAAC,GAAG,EAAE,CAAC,CAAC,CAAC,CAAC,MAAM,CAAC,QAAQ,CAAC,EAAE,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,IAAI,CAAC,GAAG,GAAG,CAAC;AACnG,QAAQ,CAAC,QAAQ,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,MAAM,CAAC,EAAE,CAAC,MAAM,CAAC,QAAQ,CAAC,EAAE,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,KAAK,CAAC,GAAG,EAAE,CAAC,CAAC,CAAC,CAAC,MAAM,CAAC,EAAE,CAAC,MAAM,CAAC,QAAQ,CAAC,EAAE,CAAC,CAAC,CAAC,CAAC,CAAC,CAAC,IAAI,CAAC,GAAG,EAAE,CAAC;AACxH,MAAM,EAAE,CAAC;AACT,IAAI,EAAE,CAAC;AACP,IAAI,iBAAiB,CAAC,CAAC,EAAE,CAAC,EAAE,CAAC;AAC7B,IAAI,aAAa,CAAC,CAAC,CAAC,IAAI,CAAC,CAAC,CAAC,UAAU,EAAE,CAAC;AACxC,IAAI,eAAe,CAAC,CAAC,CAAC,IAAI,CAAC,CAAC,CAAC,CAAC,CAAC,UAAU,CAAC,CAAC;AAC3C,EAAE,EAAE,CAAC;AACL,GAAG,MAAM,EAAE,CAAC","file":"defaults-fr_FR.js","sourcesContent":["(function ($) {\r\n  $.fn.selectpicker.defaults = {\r\n    noneSelectedText: 'Aucune sélection',\r\n    noneResultsText: 'Aucun résultat pour {0}',\r\n    countSelectedText: function (numSelected, numTotal) {\r\n      return (numSelected > 1) ? '{0} éléments sélectionnés' : '{0} élément sélectionné';\r\n    },\r\n    maxOptionsText: function (numAll, numGroup) {\r\n      return [\r\n        (numAll > 1) ? 'Limite atteinte ({n} éléments max)' : 'Limite atteinte ({n} élément max)',\r\n        (numGroup > 1) ? 'Limite du groupe atteinte ({n} éléments max)' : 'Limite du groupe atteinte ({n} élément max)'\r\n      ];\r\n    },\r\n    multipleSeparator: ', ',\r\n    selectAllText: 'Tout sélectionner',\r\n    deselectAllText: 'Tout désélectionner'\r\n  };\r\n})(jQuery);\r\n"]}