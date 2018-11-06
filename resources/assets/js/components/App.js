import React, { Component } from 'react';

class App extends Component {

    constructor(props) {
        super(props)
        this.state= {}

        //bind
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleSubmit(e) {
        e.preventDefault();
        console.log('posted');
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <div className="card">
                            <div className="card-header">Tweet something...</div>
                            <div className="card-body">
                                <form onSubmit={this.handleSubmit}>
                                    <div className="form-group">
                                    <textarea
                                        className="form-control"
                                        rows="5"
                                        maxLength="140"
                                        placeholder="What's up "
                                        required/>
                                    </div>
                                    <input type="submit" value="Post" className="form-control" />
                                </form>
                            </div>
                        </div>
                    </div>
                        <div className="col-md-6">
                            <div className="card">
                                <div className="card-header">App Component</div>
                                <div className="card-body">I am an app component!</div>
                    </div>
            </div>
        </div>
    </div>
        );
    }
}

export default App