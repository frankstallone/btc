jQuery(document).ready(function() {

	// Hide admin notification: Import folders
  jQuery(document).on('click', '#hf-notification-import-folders .notice-dismiss', function(e) {
    jQuery.ajax({
      method: 'POST',
      url: happyFiles.ajaxUrl,
      data: {
        action: 'happyfiles_dismiss_admin_notification_import_folders'
      }
    })
  })

  // Hide admin notification: First Use
  jQuery(document).on('click', '#hf-notification-first-use .notice-dismiss', function(e) {
    jQuery.ajax({
      method: 'POST',
      url: happyFiles.ajaxUrl,
      data: {
        action: 'happyfiles_dismiss_admin_notification_first_use'
      }
    })
  })

  // Hide admin notification: Rate Us
  jQuery(document).on('click', '#hf-notification-rate-plugin .notice-dismiss', function(e) {
    jQuery.ajax({
      method: 'POST',
      url: happyFiles.ajaxUrl,
      data: {
        action: 'happyfiles_dismiss_admin_notification_rate_us'
      }
    })
	})
	
	// HappyFiles Settings: Toggle tabs
	var settingsFormWrapper = document.querySelector('#happyfiles-settings-wrapper')

	if (settingsFormWrapper) {

		// Toggle tabs
		var settingsTabs = document.querySelectorAll('#happyfiles-settings-tabs a')
		var settingsFormTables = settingsFormWrapper.querySelectorAll('table')

		function showTab(tabId) {
			var tabTable = document.getElementById(tabId)

			for (var i = 0; i < settingsFormTables.length; i++) {
				var table = settingsFormTables[i]

				if (table.getAttribute('id') === tabId) {
					table.classList.add('active')
				} else {
					table.classList.remove('active')
				}
			}
		}

		// Switch tabs listener
		for (var i = 0; i < settingsTabs.length; i++) {
			settingsTabs[i].addEventListener('click', function(e) {
				e.preventDefault()
				
				var tabId = e.target.getAttribute('data-tab-id')

				if (!tabId) {
					return
				}

				location.hash = tabId
				window.scrollTo({top: 0})

				for (var i = 0; i < settingsTabs.length; i++) {
					settingsTabs[i].classList.remove('nav-tab-active')
				}

				e.target.classList.add('nav-tab-active')

				showTab(tabId)
			})
		}

		// Check URL for active tab on page load
		var activeTabId = location.hash.replace('#', '')

		if (activeTabId) {
			var activeTab = document.querySelector('[data-tab-id="' + activeTabId + '"]')

			if (activeTab) {
				activeTab.click()
			}
		}

	}

	// HappyFiles Settings: Import 3rd party plugin folders and attachments
	jQuery(document).on('click', '.happyfiles-import', function(e) {
		e.preventDefault()

		var plugin = e.target.getAttribute('data-plugin')

		if (!plugin) {
			return
		}

		var action = ['filebird', 'real-media-library'].indexOf(plugin) !== -1 ? 'happyfiles_import_terms_from_table' : 'happyfiles_import_3rd_party_terms'

		e.target.querySelector('.spinner').classList.add('is-active')
		e.target.disabled = true

		jQuery.ajax({
			method: 'POST',
			url: happyFiles.ajaxUrl,
			data: {
				action: action,
				plugin: plugin
			},
			success: function(res) {
				// console.info(res.data)

				if (res.success) {
					e.target.remove()
					
					if (res.data.hasOwnProperty('message')) {
						var messageWrapper = document.getElementById(plugin).querySelector('.message')

						if (messageWrapper) {
							messageWrapper.classList.add('success')
							messageWrapper.innerHTML = res.data.message
						} else {
							alert(res.data.message)
						}
					}
				} else {
					e.target.querySelector('.spinner').classList.remove('is-active')
					e.target.removeAttribute('disabled')

					if (res.data.hasOwnProperty('message')) {
						alert(res.data.message)
					}
				}
			}
		})
	})

	// HappyFiles Settings: Delete 3rd party plugin folders and attachments
	jQuery(document).on('click', '.happyfiles-delete', function(e) {
		e.preventDefault()

		var plugin = e.target.getAttribute('data-plugin')

		if (!plugin) {
			return
		}

		e.target.querySelector('.spinner').classList.add('is-active')
		e.target.disabled = true

		var action = ['filebird', 'real-media-library'].indexOf(plugin) !== -1 ? 'happyfiles_delete_terms_from_table' : 'happyfiles_delete_3rd_party_terms'

		jQuery.ajax({
			method: 'POST',
			url: happyFiles.ajaxUrl,
			data: {
				action: action,
				plugin: plugin
			},
			success: function(res) {
				// console.info(res.data)

				if (res.success) {
					// e.target.remove()
					location.reload()
				} else {
					e.target.querySelector('.spinner').classList.remove('is-active')
					e.target.removeAttribute('disabled')
				}
			}
		})
	})

	// Delete HappyFiles plugin data
  jQuery(document).on('click', '#hf-delete-plugin-data', function(e) {
		e.preventDefault()

		let confirmed = confirm(happyFiles.l10n.deleteHappyFilesPluginData)

		if (!confirmed) {
			return
		}

    jQuery.ajax({
      method: 'POST',
      url: happyFiles.ajaxUrl,
      data: {
        action: 'happyfiles_delete_plugin_data'
			},
			success: function(res) {
				// console.info(res)

				if (res.data.hasOwnProperty('message')) {
					alert(res.data.message)
				}

				if (res.data.hasOwnProperty('options_deleted') && res.data.options_deleted.length) {
					location.reload()
				}
			}
    })
  })

})