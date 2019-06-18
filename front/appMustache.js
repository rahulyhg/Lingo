// Julie automatic generated file
const state = {
	ajax: { 
		options: {},
		apiUrl: "http://localhost:9601",
		err: null,
		preloader: 0,
	}
}
DotObject.str("loginForm.username", "", state);
DotObject.str("loginForm.password", "", state);
DotObject.str("ajax.options.headers.Authorization", "", state);
DotObject.str("section", "", state);
DotObject.str("section", "", state);
DotObject.str("section", "", state);
DotObject.str("section", "", state);
DotObject.str("section", "", state);
DotObject.str("profile.personInfo.firstname", "", state);
DotObject.str("profile.personInfo.lastname", "", state);
DotObject.str("profile.personInfo.birth", "", state);
DotObject.str("msg", "", state);
DotObject.str("profile.changePassword.newPassword", "", state);
DotObject.str("msg", "", state);

const store = new Vuex.Store({
	state,
	mutations: {
		"loginForm.username": (state, item) => {
			state.loginForm.username = item
		},
		"loginForm.password": (state, item) => {
			state.loginForm.password = item
		},
		"userLogin": (state, item) => {
			state.ajax.preloader++
			const options = Object.assign({}, state.ajax.options)
			$.ajax({ 
				method: "post", 
				url: `${state.ajax.apiUrl}/login`,				data: state.loginForm,
				headers: state.ajax.options.headers
			}).done(res => {
				state.ajax.options.headers.Authorization = res
			}).fail(err => {
				state.ajaxErr = err
			}).always(() => {
				state.ajax.preloader--
			})
		},
		"mainMenuCalendar": (state, item) => {
			state.section = "calendar"
		},
		"mainMenuProfile": (state, item) => {
			state.section = "profile"
		},
		"mainMenuMeetings": (state, item) => {
			state.section = "meetings"
		},
		"mainMenuContacts": (state, item) => {
			state.section = "contacts"
		},
		"mainMenuEducation": (state, item) => {
			state.section = "education"
		},
		"profile.personInfo.firstname": (state, item) => {
			state.profile.personInfo.firstname = item
		},
		"profile.personInfo.lastname": (state, item) => {
			state.profile.personInfo.lastname = item
		},
		"profile.personInfo.birth": (state, item) => {
			state.profile.personInfo.birth = item
		},
		"savePersonInfo": (state, item) => {
			state.ajax.preloader++
			const options = Object.assign({}, state.ajax.options)
			$.ajax({ 
				method: "put", 
				url: `${state.ajax.apiUrl}/person`,				data: state.profile.person,
				headers: state.ajax.options.headers
			}).done(res => {
				state.msg = 'Profil byl uložen'
			}).fail(err => {
				state.ajaxErr = err
			}).always(() => {
				state.ajax.preloader--
			})
		},
		"profile.changePassword.newPassword": (state, item) => {
			state.profile.changePassword.newPassword = item
		},
		"saveProfilePassword": (state, item) => {
			state.ajax.preloader++
			const options = Object.assign({}, state.ajax.options)
			$.ajax({ 
				method: "put", 
				url: `${state.ajax.apiUrl}/users/change-password`,				data: state.profile.changePassword,
				headers: state.ajax.options.headers
			}).done(res => {
				state.msg = 'Heslo bylo změněno'
			}).fail(err => {
				state.ajaxErr = err
			}).always(() => {
				state.ajax.preloader--
			})
		},
	}
})

Vue.component(`login-form-username`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><input :value="$store.state.loginForm.username" @input="$store.commit('loginForm.username',$event.target.value)" type="text" placeholder="E-mail">
</input></span>`,
})

Vue.component(`login-form-username-row`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div class="row">
	<login-form-username />
</div></span>`,
})

Vue.component(`login-form-password`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><input :value="$store.state.loginForm.password" @input="$store.commit('loginForm.password',$event.target.value)" type="password" placeholder="Password">
</input></span>`,
})

Vue.component(`login-form-pasword-row`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div class="row">
	<login-form-password />
</div></span>`,
})

Vue.component(`login-form-send`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><button class="btn btn-primary" v-text="'Log in'" @click="$store.commit('userLogin',item)">
</button></span>`,
})

Vue.component(`login-form-send-row`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div class="row">
	<login-form-send />
</div></span>`,
})

Vue.component(`login-form`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
	<login-form-username-row />
	<login-form-pasword-row />
	<login-form-send-row />
</div></span>`,
})

Vue.component(`login`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-if="!$store.state.ajax.options.headers.Authorization" class="container">
	<login-form />
</div></span>`,
})

Vue.component(`admin-main-menu-calendar`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><a v-text="'Kalendář'" @click="$store.commit('mainMenuCalendar',item)">
</a></span>`,
})

Vue.component(`admin-main-menu-profile`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><a v-text="'Profil'" @click="$store.commit('mainMenuProfile',item)">
</a></span>`,
})

Vue.component(`admin-main-menu-meetings`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><a v-text="'Schůzky'" @click="$store.commit('mainMenuMeetings',item)">
</a></span>`,
})

Vue.component(`admin-main-menu-contacts`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><a v-text="'Kontakty'" @click="$store.commit('mainMenuContacts',item)">
</a></span>`,
})

Vue.component(`admin-main-menu-education`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><a v-text="'Semináře a školení'" @click="$store.commit('mainMenuEducation',item)">
</a></span>`,
})

Vue.component(`admin-main-menu`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div class="row">
	<admin-main-menu-calendar />
	<admin-main-menu-profile />
	<admin-main-menu-meetings />
	<admin-main-menu-contacts />
	<admin-main-menu-education />
</div></span>`,
})

Vue.component(`admin-profile`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div class="row">
</div></span>`,
})

Vue.component(`admin-content-calendar-new-appointment`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-calendar-new-meeting`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-calendar-meeting-result`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-meeting-info`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-calendar`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-if="$store.state.section === 'calendar'">
	<admin-content-calendar-new-appointment />
	<admin-content-calendar-new-meeting />
	<admin-content-calendar-meeting-result />
	<admin-content-meeting-info />
</div></span>`,
})

Vue.component(`admin-content-profile-person-info-heading`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><h2>
</h2></span>`,
})

Vue.component(`admin-content-profile-person-info-form-firstname-input`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><input :value="$store.state.profile.personInfo.firstname" @input="$store.commit('profile.personInfo.firstname',$event.target.value)" type="text">
</input></span>`,
})

Vue.component(`admin-content-profile-person-info-form-firstname`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div class="row">
	<admin-content-profile-person-info-form-firstname-input />
</div></span>`,
})

Vue.component(`admin-content-profile-person-info-form-lastname-input`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><input :value="$store.state.profile.personInfo.lastname" @input="$store.commit('profile.personInfo.lastname',$event.target.value)" type="text">
</input></span>`,
})

Vue.component(`admin-content-profile-person-info-form-lastname`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div class="row">
	<admin-content-profile-person-info-form-lastname-input />
</div></span>`,
})

Vue.component(`admin-content-profile-person-info-form-birth-input`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><input :value="$store.state.profile.personInfo.birth" @input="$store.commit('profile.personInfo.birth',$event.target.value)" type="date">
</input></span>`,
})

Vue.component(`admin-content-profile-person-info-form-birth`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div class="row">
	<admin-content-profile-person-info-form-birth-input />
</div></span>`,
})

Vue.component(`admin-content-profile-person-info-form-save-button`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><button @click="$store.commit('savePersonInfo',item)" v-text="'Uložit'" class="btn btn-primary">
</button></span>`,
})

Vue.component(`admin-content-profile-person-info-form-save`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
	<admin-content-profile-person-info-form-save-button />
</div></span>`,
})

Vue.component(`admin-content-profile-person-info-form`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
	<admin-content-profile-person-info-form-firstname />
	<admin-content-profile-person-info-form-lastname />
	<admin-content-profile-person-info-form-birth />
	<admin-content-profile-person-info-form-save />
</div></span>`,
})

Vue.component(`admin-content-profile-person-info`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
	<admin-content-profile-person-info-heading />
	<admin-content-profile-person-info-form />
</div></span>`,
})

Vue.component(`admin-content-profile-change-password-heading`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><h2 v-text="'Změna hesla'">
</h2></span>`,
})

Vue.component(`admin-content-profile-change-password-new-password`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><input :type="'password'" :value="$store.state.profile.changePassword.newPassword" @input="$store.commit('profile.changePassword.newPassword',$event.target.value)">
</input></span>`,
})

Vue.component(`admin-content-profile-change-password-show-password`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><button class="btn btn-danger" @mousedown="show = true" @mouseup="show = false">
</button></span>`,
})

Vue.component(`admin-content-profile-change-password-form-save`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><button class="btn btn-primary" @click="$store.commit('saveProfilePassword',item)">
</button></span>`,
})

Vue.component(`admin-content-profile-change-password-form`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div class="row">
	<admin-content-profile-change-password-new-password />
	<admin-content-profile-change-password-show-password />
	<admin-content-profile-change-password-form-save />
</div></span>`,
})

Vue.component(`admin-content-profile-change-password`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
	<admin-content-profile-change-password-heading />
	<admin-content-profile-change-password-form />
</div></span>`,
})

Vue.component(`admin-content-profile`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-if="$store.state.section === 'profile'">
	<admin-content-profile-person-info />
	<admin-content-profile-change-password />
</div></span>`,
})

Vue.component(`admin-content-meetings-filter-range`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-meetings-filter-persons`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-meetings-filter-result`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-meetings-filter`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
	<admin-content-meetings-filter-range />
	<admin-content-meetings-filter-persons />
	<admin-content-meetings-filter-result />
</div></span>`,
})

Vue.component(`admin-content-meetings-list-item-appointment`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-meetings-list-item-participants`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-meetings-list-item-result`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-meetings-list-item-comment`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-meetings-list-item`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
	<admin-content-meetings-list-item-appointment />
	<admin-content-meetings-list-item-participants />
	<admin-content-meetings-list-item-result />
	<admin-content-meetings-list-item-comment />
</div></span>`,
})

Vue.component(`admin-content-meetings-list`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-for="item of $store.meetings">
	<admin-content-meetings-list-item />
</div></span>`,
})

Vue.component(`admin-content-meetings-statistics`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-meetings`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-if="$store.state.section === 'meetings'">
	<admin-content-meetings-filter />
	<admin-content-meetings-list />
	<admin-content-meetings-statistics />
</div></span>`,
})

Vue.component(`admin-content-contacts-list-filter`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-contacts-list-list`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-contacts-list`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-if="!$store.state.selectedContact">
	<admin-content-contacts-list-filter />
	<admin-content-contacts-list-list />
</div></span>`,
})

Vue.component(`admin-content-contacts-detail-heading`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-contacts-detail-edit`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-contacts-detail-info`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-contacts-detail-meetings`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-contacts-detail`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-if="$store.state.selectedContact">
	<admin-content-contacts-detail-heading />
	<admin-content-contacts-detail-edit />
	<admin-content-contacts-detail-info />
	<admin-content-contacts-detail-meetings />
</div></span>`,
})

Vue.component(`admin-content-contacts`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-if="$store.state.section === 'contacts'">
	<admin-content-contacts-list />
	<admin-content-contacts-detail />
</div></span>`,
})

Vue.component(`admin-content-education-groups-item-heading`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-education-groups-item-list-item-appointment`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-education-groups-item-list-item-address`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-education-groups-item-list-item-participants`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
</div></span>`,
})

Vue.component(`admin-content-education-groups-item-list-item`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-if="item.education_group_id === education_group.id">
	<admin-content-education-groups-item-list-item-appointment />
	<admin-content-education-groups-item-list-item-address />
	<admin-content-education-groups-item-list-item-participants />
</div></span>`,
})

Vue.component(`admin-content-education-groups-item-list`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-for="item of $store.state.education">
	<admin-content-education-groups-item-list-item />
</div></span>`,
})

Vue.component(`admin-content-education-groups-item`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div>
	<admin-content-education-groups-item-heading />
	<admin-content-education-groups-item-list />
</div></span>`,
})

Vue.component(`admin-content-education-groups`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-if="!$store.state.selectedEducation" v-for="item of $store.state.educationGroups">
	<admin-content-education-groups-item />
</div></span>`,
})

Vue.component(`admin-content-education-detail`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-if="$store.state.selectedEducation">
</div></span>`,
})

Vue.component(`admin-content-education`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-if="$store.state.section === 'education'">
	<admin-content-education-groups />
	<admin-content-education-detail />
</div></span>`,
})

Vue.component(`admin-content`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div class="row">
	<admin-content-calendar />
	<admin-content-profile />
	<admin-content-meetings />
	<admin-content-contacts />
	<admin-content-education />
</div></span>`,
})

Vue.component(`admin`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div v-if="$store.state.ajax.options.headers.Authorization" class="container">
	<admin-main-menu />
	<admin-profile />
	<admin-content />
</div></span>`,
})

Vue.component(`app`, {
	store: store,
	data: function() {
		return {
		}
	},
	props: [ "item" ],
	template: `<span><div class="container-fluid">
	<login />
	<admin />
</div></span>`,
})


const VueApp = new Vue({ el: "#app", store });
