// languages text

var menuTextArr = {
  // index.html languages text
  'en': {
    'menu': 'Menu',

  },
  'tc': {
    'caidan ': '菜單',

  }

};

var languages = 
{ 
  // back-end menu languages text
  'menu': {
    'en': {
      'title': 'Menu management',
      'add': 'Add',
      'expand': 'Expand',
      'collapse': 'Collapse',
      'iconName': 'Icon name',
      'english': 'English',
      'chinese': 'Chinese',
      'link': 'Link',
      'submit': 'Submit',
      'cancel': 'Cancel',
      'subjectCode': 'Subject code',
      'remarks': 'Remarks',
    },
    'tc': {
      'title': '菜單管理',
      'add': '新增',
      'expand': '擴展',
      'collapse': '折合',
      'iconName': 'Icon名稱',
      'english': '英文',
      'chinese': '中文',
      'link': '鏈接',
      'submit': '提交',
      'cancel': '取消',
      'subjectCode': '主題編碼',
      'remarks': '備註',
    }
  },

};

// language page setting
(function(){
  $(document).ready(function()
  {
    
    var page = 'menu';
    var lang = 'en';

    $("#languageEN").click(function()
    {
      lang = 'en';
      $('.lang').each(function(index, item) {
        $(this).text(languages[page][lang][$(this).attr('key')]);
      });
    });

    $("#languageTC").click(function()
    {
      lang = 'tc';
      $('.lang').each(function(index, item) {
        $(this).text(languages[page][lang][$(this).attr('key')]);
      });
    });

    $('.lang').each(function(index, item) {
      $(this).text(languages[page][lang][$(this).attr('key')]);
    });

  });

})();