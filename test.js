var TestObject = (function(){
    this.Name = null
    function TestObject(name) {
        _classCallCheck(this, TestObject);
        this.Name = name;
    };
    TestObject.prototype.start_custom = function () {
        console.log('My name = '+this.Name);
    };
    return TestObject;
});