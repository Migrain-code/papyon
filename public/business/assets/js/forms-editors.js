/**
 * Form Editors
 */

'use strict';

(function () {
  // Full Toolbar
  // --------------------------------------------------------------------
  const fullToolbar = [
    [
        {
            font: ['sans-serif', 'serif', 'monospace',]
        },
        {
            size: ['small', 'large', 'huge']
        }
    ],
    ['bold', 'italic', 'underline', 'strike'],
    [
      {
        color: ['red', 'black', 'white']
      },
      {
        background: []
      }
    ],
    [
      {
        script: 'super'
      },
      {
        script: 'sub'
      }
    ],
    [
      {
        header: '1'
      },
      {
        header: '2'
      },
        {
            header: [3, 4, 5, 6, false]
        },
      'blockquote',
      'code-block'
    ],
    [
      {
        list: 'ordered'
      },
      {
        list: 'bullet'
      },
      {
        indent: '-1'
      },
      {
        indent: '+1'
      }
    ],
    [{ direction: 'rtl' }],
    ['link', 'image', 'video', 'formula'],
    ['clean']
  ];
  fullEditor = new Quill('#full-editor', {
    bounds: '#full-editor',
    placeholder: 'Type Something...',
    modules: {
      formula: true,
      toolbar: fullToolbar
    },
    theme: 'snow'
  });

})();
