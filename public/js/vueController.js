/*
var data = [
    {name: "sohag", email: "sadibigboss@gmail.com", address: "Brahmanbaria", phone: 01726688748}
];
*/

/**
Initiate the page with this data
*/

// Register email validator function. 
Vue.validator('email', function (val) {
  return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(val)
})


var table_data = Vue.extend({
    template: "#table-data",
    data: function() {
        return {
            members: [

            ]
        }
    },
    methods: {
        getMembers: function() {
            this.$http.get('/vuejs/public/data')
                .then((data) => {
                this.$set('members', data.json());
             });
         }
    },
    ready: function() {
        this.getMembers();
    }
});

/**
create page
*/
var Create = Vue.extend({
	template: "#member_create",
	data: function() {
		return {
			data: {
			
			},
			success: false,
			email: ''
		}
	},
	methods: {
		getCreate: function(params) {
			this.$http.post('/vuejs/public/test', {name: params.name, email: params.email, address: params.address, phone: params.phone, occupation: params.occupation})
				.then((data) => {
					this.success = true;
					this.$resetValidation();
					params.name = '';
					params.email = '';
					params.address = '';
					params.phone = '';
					params.occupation = '';
				})
		}
	}
})


// configure router
var router = new VueRouter({
    root: '/',
    hashbang: false,
    history: false
});

router.map({
    '/': {
        component: table_data
    },
    '/view/:member_id': {
        name: 'view',
        component: {
        	data: function() {
        		return {
        			view_member: []
        		}
        	},
            template: '#member_view',
            ready: function() {
                this.getEdit();
            },
            methods: {
                getEdit: function() {
                    this.$http.get('/vuejs/public/test/' + this.$route.params.member_id)
                        .then((data) => {
                        this.$set('view_member', data.json());
                    })
                }
            }
        }
    },
    '/edit/:member_id': {
        name: 'edit',
        component: {
            template: '#member_edit'
        }
    },
    '/create': {
    	component: Create
    },
    '/delete/:member_id': {
    	name: 'delete',
    	component: {
    		methods: {
    			getDelete: function() {
    				alert(this.$route.params.member_id)
    			}
    		},
    		ready: function() {
    			this.$http.delete('/vuejs/public/test/' + this.$route.params.member_id)
                     .then((data) => {
                        router.go('/')
                    })
    		}
    	}
    }
});

// start app
var App = Vue.extend({})
router.start(App, '#app')

/*

var getMembers = Vue.extend({
    template: "#table-data",
    methods: {
        members: function() {
            this.$http.get('/vuejs/public/data')
                .then((data) => {
                this.$set('members', data.json());
            })
        }
    }
});
*/

