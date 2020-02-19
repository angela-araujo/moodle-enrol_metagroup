ajax.call([{
            methodname: 'enrol_metagroup_get_groupids',
            args: {courseid: courseid, jsonformdata: JSON.stringify(data)},
            done: this._handleFormSubmissionResponse.bind(this, data, nextUserId),
            fail: notification.exception
        }]);