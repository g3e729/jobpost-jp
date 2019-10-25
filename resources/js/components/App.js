import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './Header'
import Companies from './companies/index'
import Company from './companies/show'

class App extends Component {
  render () {

    return (
      <BrowserRouter>
        <div>
          <Header />
          <Switch>
            <Route exact path='/react/companies' component={Companies} />
            <Route exact path='/react/companies/:id' component={Company} />
          </Switch>
        </div>
      </BrowserRouter>
    )
  }
}

ReactDOM.render(<App />, document.getElementById('app'))