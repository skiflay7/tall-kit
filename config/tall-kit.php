<?php

$locale = strtolower(substr(app()->getLocale(), 0, 2));

return [
    'prefix' => '',

    'components' => [
        /**
         * Alerts.
         */
        'alert' => \Datalogix\TALLKit\Components\Alerts\Alert::class,

        /**
         * Buttons.
         */
        'button' => \Datalogix\TALLKit\Components\Buttons\Button::class,
        'bt' => \Datalogix\TALLKit\Components\Buttons\Button::class,  // alias
        'btn' => \Datalogix\TALLKit\Components\Buttons\Button::class, // alias,
        'form-button' => \Datalogix\TALLKit\Components\Buttons\FormButton::class,
        'form-bt' => \Datalogix\TALLKit\Components\Buttons\FormButton::class,
        'form-btn' => \Datalogix\TALLKit\Components\Buttons\FormButton::class,
        'logout' => \Datalogix\TALLKit\Components\Buttons\Logout::class,

        /**
         * Editors.
         */
        'editor' => \Datalogix\TALLKit\Components\Editors\Quill::class, // alias,
        'easy-mde' => \Datalogix\TALLKit\Components\Editors\EasyMDE::class,
        'mde' => \Datalogix\TALLKit\Components\Editors\EasyMDE::class,
        'quill' => \Datalogix\TALLKit\Components\Editors\Quill::class,
        'trix' => \Datalogix\TALLKit\Components\Editors\Trix::class,

        /**
         * Forms.
         */
        'checkbox' => \Datalogix\TALLKit\Components\Forms\Checkbox::class,
        'check' => \Datalogix\TALLKit\Components\Forms\Checkbox::class, // alias
        'errors' => \Datalogix\TALLKit\Components\Forms\Errors::class,
        'error' => \Datalogix\TALLKit\Components\Forms\Errors::class, // alias
        'form' => \Datalogix\TALLKit\Components\Forms\Form::class,
        'group' => \Datalogix\TALLKit\Components\Forms\Group::class,
        'input' => \Datalogix\TALLKit\Components\Forms\Input::class,
        'field' => \Datalogix\TALLKit\Components\Forms\Input::class, // alias
        'label' => \Datalogix\TALLKit\Components\Forms\Label::class,
        'lbl' => \Datalogix\TALLKit\Components\Forms\Label::class, // alias
        'radio' => \Datalogix\TALLKit\Components\Forms\Radio::class,
        'select' => \Datalogix\TALLKit\Components\Forms\Select::class,
        'submit' => \Datalogix\TALLKit\Components\Forms\Submit::class,
        'textarea' => \Datalogix\TALLKit\Components\Forms\Textarea::class,

        /**
         * Layouts.
         */
        'html' => \Datalogix\TALLKit\Components\Layouts\Html::class,
        'meta' => \Datalogix\TALLKit\Components\Layouts\SocialMeta::class,
        'social-meta' => \Datalogix\TALLKit\Components\Layouts\SocialMeta::class,

        /**
         * Navigations.
         */
        'dropdown' => \Datalogix\TALLKit\Components\Navigations\Dropdown::class,
        'menu' => \Datalogix\TALLKit\Components\Navigations\Menu::class,
        'menu-item' => \Datalogix\TALLKit\Components\Navigations\MenuItem::class,

        /**
         * Pickers.
         */
        'datetime-picker' => \Datalogix\TALLKit\Components\Pickers\Flatpickr::class, // alias
        'datetimepicker' => \Datalogix\TALLKit\Components\Pickers\Flatpickr::class, // alias
        'flatpickr' => \Datalogix\TALLKit\Components\Pickers\Flatpickr::class,

        'colorpicker' => \Datalogix\TALLKit\Components\Pickers\Pickr::class, // alias
        'color-picker' => \Datalogix\TALLKit\Components\Pickers\Pickr::class, // alias
        'pickr' => \Datalogix\TALLKit\Components\Pickers\Pickr::class,

        'datepicker' => \Datalogix\TALLKit\Components\Pickers\Pikaday::class, // alias
        'date-picker' => \Datalogix\TALLKit\Components\Pickers\Pikaday::class, // alias
        'pikaday' => \Datalogix\TALLKit\Components\Pickers\Pikaday::class,

        /**
         * Tables.
         */
        'table' => \Datalogix\TALLKit\Components\Tables\Table::class,
        'heading' => \Datalogix\TALLKit\Components\Tables\Heading::class,
        'head' => \Datalogix\TALLKit\Components\Tables\Heading::class, // alias
        'th' => \Datalogix\TALLKit\Components\Tables\Heading::class, // alias
        'row' => \Datalogix\TALLKit\Components\Tables\Row::class,
        'tr' => \Datalogix\TALLKit\Components\Tables\Row::class, // alias
        'cell' => \Datalogix\TALLKit\Components\Tables\Cell::class,
        'td' => \Datalogix\TALLKit\Components\Tables\Cell::class, // alias
    ],

    'themes' => [
        'default' => [
            /**
             * Alerts.
             */
            'alert' => [
                'container' => [
                    'class' => 'flex flex-row items-center p-5 rounded relative',
                ],

                'icon' => [
                    'class' => 'flex items-center border-2 justify-center h-10 w-10 flex-shrink-0 rounded-full mr-4',
                ],

                'dismissible' => [
                    'container' => [
                        'class' => 'absolute top-0 right-0 px-4 py-3 outline-none focus:outline-none flex items-center',
                    ],

                    'icon' => [
                        'class' => 'flex items-center justify-center h-8 w-8 flex-shrink-0 rounded-full',
                    ],

                    'iconSvg' => '<svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>',

                    'iconName' => 'close',

                    'text' => [
                        'class' => 'mx-2 text-sm text-gray-400',
                    ],
                ],

                'title' => [
                    'class' => 'font-semibold text-lg',
                ],

                'message' => [
                    'class' => 'text-sm',
                ],

                'types' => [
                    'default' => [
                        'color' => 'gray',
                        'iconSvg' => false,
                        'iconName' => false,
                        'title' => false,
                    ],

                    'error' => [
                        'color' => 'red',
                        'iconSvg' => '<svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>',
                        'iconName' => 'close',
                        'title' => 'Error',
                    ],

                    'info' => [
                        'color' => 'blue',
                        'iconSvg' => '<svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>',
                        'iconName' => 'information',
                        'title' => 'Info',
                    ],

                    'success' => [
                        'color' => 'green',
                        'iconSvg' => '<svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>',
                        'iconName' => 'check',
                        'title' => 'Success',
                    ],

                    'warning' => [
                        'color' => 'yellow',
                        'iconSvg' => '<svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>',
                        'iconName' => 'alert',
                        'title' => 'Warning',
                    ],
                ],

                'styles' => [
                    'default' => [
                        'class' => 'border-2',
                    ],

                    'top' => [
                        'class' => 'border-t-2',
                    ],

                    'bottom' => [
                        'class' => 'border-b-2',
                    ],

                    'left' => [
                        'class' => 'border-l-2',
                    ],

                    'right' => [
                        'class' => 'border-r-2',
                    ],

                    'banner' => [
                        'class' => 'border-t-2 border-b-2',
                    ],
                ],

                'rounded' => [
                    'default' => [
                        'class' => 'rounded',
                    ],

                    'sm' => [
                        'class' => 'rounded-sm',
                    ],

                    'md' => [
                        'class' => 'rounded-md',
                    ],

                    'lg' => [
                        'class' => 'rounded-lg',
                    ],

                    'full' => [
                        'class' => 'rounded-full',
                    ],
                ],

                'shadow' => [
                    'default' => [
                        'class' => 'shadow',
                    ],

                    'xs' => [
                        'class' => 'shadow-xs',
                    ],

                    'sm' => [
                        'class' => 'shadow-sm',
                    ],

                    'md' => [
                        'class' => 'shadow-md',
                    ],

                    'lg' => [
                        'class' => 'shadow-lg',
                    ],

                    'xl' => [
                        'class' => 'shadow-xl',
                    ],

                    '2xl' => [
                        'class' => 'shadow-2xl',
                    ],

                    'inner' => [
                        'class' => 'shadow-inner',
                    ],

                    'outline' => [
                        'class' => 'shadow-outline',
                    ],

                    'none' => [
                        'class' => 'shadow-none',
                    ],
                ],
            ],

            /**
             * Buttons.
             */
            'button' => [
                'container' => [
                    'class' => 'flex items-center justify-between',
                ],

                'button' => [
                    'class' => 'font-bold py-2 px-4 focus:outline-none focus:shadow-outline',
                ],

                'colors' => [
                    'default' => [
                        'name' => 'gray',
                        'weight' => 500,
                        'hover' => 700,
                    ],

                    'info' => [
                        'name' => 'blue',
                        'weight' => 500,
                        'hover' => 700,
                    ],

                    'error' => [
                        'name' => 'red',
                        'weight' => 500,
                        'hover' => 700,
                    ],

                    'success' => [
                        'name' => 'green',
                        'weight' => 500,
                        'hover' => 700,
                    ],

                    'warning' => [
                        'name' => 'yellow',
                        'weight' => 500,
                        'hover' => 700,
                    ],
                ],

                'rounded' => [
                    'default' => [
                        'class' => 'rounded',
                    ],

                    'sm' => [
                        'class' => 'rounded-sm',
                    ],

                    'md' => [
                        'class' => 'rounded-md',
                    ],

                    'lg' => [
                        'class' => 'rounded-lg',
                    ],

                    'full' => [
                        'class' => 'rounded-full',
                    ],
                ],

                'shadow' => [
                    'default' => [
                        'class' => 'shadow',
                    ],

                    'xs' => [
                        'class' => 'shadow-xs',
                    ],

                    'sm' => [
                        'class' => 'shadow-sm',
                    ],

                    'md' => [
                        'class' => 'shadow-md',
                    ],

                    'lg' => [
                        'class' => 'shadow-lg',
                    ],

                    'xl' => [
                        'class' => 'shadow-xl',
                    ],

                    '2xl' => [
                        'class' => 'shadow-2xl',
                    ],

                    'inner' => [
                        'class' => 'shadow-inner',
                    ],

                    'outline' => [
                        'class' => 'shadow-outline',
                    ],

                    'none' => [
                        'class' => 'shadow-none',
                    ],
                ],
            ],

            'form-button' => [
                'container' => '',

                'button' => [],
            ],

            'logout' => [
                'button' => [],
            ],

            /**
             * Editors.
             */
            'easy-mde' => [
                'easymde' => [],
            ],

            'quill' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'labelText' => '',

                'quill' => [
                    'class' => 'quill-container',
                ],

                'errors' => '',
            ],

            'trix' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'labelText' => '',

                'trix' => [
                    'class' => 'trix-content',
                ],

                'errors' => '',
            ],

            /**
             * Forms.
             */
            'checkbox' => [
                'container' => [
                    'class' => 'flex flex-col',
                ],

                'label' => [
                    'class' => 'flex items-center',
                ],

                'labelText' => [
                    'class' => 'ml-2',
                ],

                'checkbox' => [
                    'class' => 'form-checkbox',
                ],

                'errors' => '',
            ],

            'errors' => [
                'container' => [
                    'class' => 'text-red-500 text-xs italic',
                ],
            ],

            'form' => [
                'container' => [],
            ],

            'group' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'labelText' => '',

                'inline' => [
                    'class' => 'flex flex-wrap space-x-6',
                ],

                'block' => [],

                'errors' => '',
            ],

            'input' => [
                'hidden' => [
                    'class' => 'hidden',
                ],

                'container' => [
                    'class' => 'mb-4',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'labelText' => '',

                'input' => [
                    'class' => 'form-input block w-full',
                ],

                'errors' => '',

                'types' => [
                    /*
                    'password' => [
                        'class' => 'custom-class-per-type',
                    ],
                    */
                ],
            ],

            'label' => [
                'container' => [
                    'class' => 'block mb-1 text-sm font-medium text-gray-700',
                ],
            ],

            'radio' => [
                'container' => [],

                'label' => [
                    'class' => 'inline-flex items-center',
                ],

                'labelText' => [
                    'class' => 'ml-2',
                ],

                'radio' => [
                    'class' => 'form-radio',
                ],

                'errors' => '',
            ],

            'select' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'labelText' => '',

                'multiselect' => [
                    'class' => 'form-multiselect block w-full',
                ],

                'select' => [
                    'class' => 'form-select block w-full',
                ],

                'errors' => '',
            ],

            'textarea' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'labelText' => '',

                'textarea' => [
                    'class' => 'form-textarea block w-full',
                ],

                'errors' => '',
            ],

            /**
             * Layouts.
             */
            'html' => [
                'html' => [],

                'head' => [],

                'body' => [],
            ],

            'social-meta' => [],

            /**
             * Navigations.
             */
            'dropdown' => [
                'container' => [
                    'class' => 'relative',
                ],

                'trigger' => [
                    'class' => '',
                ],

                'dropdown' => [
                    'class' => 'absolute',
                ],
            ],

            'menu' => [
                'container' => [
                    'class' => 'bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 rounded shadow overflow-hidden',
                    'role' => 'menu',
                ],

                'inline' => [
                    'class' => 'flex items-center justify-center divide-y-0 divide-x',
                ],
            ],

            'menu-item' => [
                'container' => [
                    'class' => 'mx-3',
                ],

                'link' => [
                    'class' => 'flex items-center py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900',
                    'role' => 'menuitem',
                ],

                'button' => [
                    'class' => 'flex items-center py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 outline-none focus:outline-none',
                    'role' => 'menuitem',
                ],

                'iconLeft' => 'mr-3',

                'iconRight' => 'ml-3',
            ],

            /**
             * Pickers.
             */
            'flatpickr' => [
                'flatpickr' => [],
            ],

            'pickr' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'labelText' => '',

                'pickr' => [],

                'errors' => '',
            ],

            'pikaday' => [
                'pikaday' => [],
            ],

            /**
             * Tables.
             */
            'cell' => [
                'td' => [
                    'class' => 'px-6 py-4 whitespace-nowrap text-sm text-gray-500',
                ],
            ],

            'heading' => [
                'th' => [
                    'class' => 'px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider',
                    'scope' => 'col',
                ],

                'container' => [
                    'class' => 'flex items-center'
                ],

                'sortable' => [
                    'asc' => '<svg class="asc fill-current w-4 h-4 text-gray-500" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z" /></svg>',
                    'desc' => '<svg class="desc fill-current w-4 h-4 text-gray-500" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>',
                ],
            ],

            'row' => [
                'tr' => [
                    'class' => '',
                ],
            ],

            'table' => [
                'container' => [
                    'class' => 'shadow overflow-hidden border-b border-gray-200 sm:rounded-lg',
                ],

                'table' => [
                    'class' => 'min-w-full divide-y divide-gray-200',
                ],

                'thead' => [
                    'class' => ''
                ],

                'tbody' => [
                    'class' => 'bg-white divide-y divide-gray-200'
                ],

                'tfoot' => [
                    'class' => ''
                ],

                'emptyText' => [
                    'class' => 'px-6 py-4 whitespace-nowrap text-lg text-gray-500 text-center',
                ],
            ],
        ],
    ],

    'assets' => [
        'alpine' => [
            'https://cdn.jsdelivr.net/npm/alpinejs@2.7.3/dist/alpine.min.js',
        ],

        'moment' => [
            'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js',
        ],

        /**
         * Forms.
         */
        'inputmask' => [
            'https://cdn.jsdelivr.net/npm/inputmask@5.0.5/dist/inputmask.min.js',
            'Inputmask.extendAliases({
                date_pt_BR: {
                    alias: "datetime",
                    inputformat: "dd/mm/yyyy"
                },
                datetime_pt_BR: {
                    alias: "datetime",
                    inputformat: "dd/mm/yyyy HH:MM"
                },
                phone_pt_BR: {
                    mask: "(99) 99999999[9]"
                },
                price_pt_BR: {
                    alias: "numeric",
                    autoGroup: true,
                    groupSeparator: ".",
                    digits: 2,
                    digitsOptional: false,
                    radixPoint: ",",
                    prefix: "R$ ",
                    placeholder: "0",
                    unmaskAsNumber: true,
                    removeMaskOnSubmit: true
                },
                time_pt_BR: {
                    alias: "datetime",
                    inputformat: "HH:MM"
                },
                weight_pt_BR: {
                    mask: "9{1,3}[.9{1,2}]"
                },
                zipcode_pt_BR: {
                    mask: "99999-999"
                }
            })',
        ],

        /**
         * Pickers.
         */
        'flatpickr' => [
            'https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/flatpickr.min.css',
            'https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/flatpickr.min.js',
            $locale != 'en' ? 'https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/l10n/'.$locale.'.min.js' : '',
        ],

        'pickr' => [
            'https://cdn.jsdelivr.net/npm/@simonwep/pickr@1.7.4/dist/themes/classic.min.css',
            'https://cdn.jsdelivr.net/npm/@simonwep/pickr@1.7.4/dist/pickr.min.js',
        ],

        'pikaday' => [
            'https://cdn.jsdelivr.net/npm/pikaday@1.8.2/css/pikaday.min.css',
            'https://cdn.jsdelivr.net/npm/pikaday@1.8.2/pikaday.min.js',
        ],

        /**
         * Editors.
         */
        'easy-mde' => [
            'https://cdn.jsdelivr.net/npm/easymde@2.13.0/dist/easymde.min.css',
            'https://cdn.jsdelivr.net/npm/easymde@2.13.0/dist/easymde.min.js',
        ],

        'quill' => [
            'https://cdn.quilljs.com/1.3.7/quill.snow.css',
            'https://cdn.quilljs.com/1.3.7/quill.min.js',
        ],

        'trix' => [
            'https://cdn.jsdelivr.net/npm/trix@1.3.0/dist/trix.min.css',
            'https://cdn.jsdelivr.net/npm/trix@1.3.0/dist/trix.min.js',
        ],
    ],
];
