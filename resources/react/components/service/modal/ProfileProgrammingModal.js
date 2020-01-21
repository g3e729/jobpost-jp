import React, { useState } from 'react';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Radio from '../../common/Radio';

const ProfileProgrammingModal = _ => {
  const dispatch = useDispatch(); // TODO on other events
  const [formValues, setFormValues] = useState({
    item1: 'item1a',
    item2: 'item2a',
    item3: 'item3a',
    item4: 'item4a',
    item5: 'item5a',
  });

  const toggleChange = e => {
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.value }
    });
  }

  // TODO: use map
  return (
    <BaseModal title="プログラミング言語">
      <div className="modal__content">
        <form className="modal__form" onSubmit={_ => console.log('Submit programming')}>
          <ul className="modal__form-table">
            <li className="modal__form-table-item modal__form-table-item--header">
              <div className="modal__form-table-item-wrapper">
                <span className="modal__form-table-item-label"></span>
                <span className="modal__form-table-item-label">なし</span>
                <span className="modal__form-table-item-label">半年以内</span>
                <span className="modal__form-table-item-label">1年以内</span>
                <span className="modal__form-table-item-label">1年以上</span>
                <span className="modal__form-table-item-label">２年以上</span>
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  HTML5&CSS3
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item1a"
                  checked={formValues.item1 === "item1a"}
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item1b"
                  checked={formValues.item1 === "item1b"}
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item1c"
                  checked={formValues.item1 === "item1c"}
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item1d"
                  checked={formValues.item1 === "item1d"}
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item1e"
                  checked={formValues.item1 === "item1e"}
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                />
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  Javascript
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item2a"
                  checked={formValues.item2 === "item2a"}
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item2b"
                  checked={formValues.item2 === "item2b"}
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item2c"
                  checked={formValues.item2 === "item2c"}
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item2d"
                  checked={formValues.item2 === "item2d"}
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item2e"
                  checked={formValues.item2 === "item2e"}
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                />
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  PHP
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item3a"
                  checked={formValues.item3 === "item3a"}
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item3b"
                  checked={formValues.item3 === "item3b"}
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item3c"
                  checked={formValues.item3 === "item3c"}
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item3d"
                  checked={formValues.item3 === "item3d"}
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item3e"
                  checked={formValues.item3 === "item3e"}
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                />
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  Python
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item4a"
                  checked={formValues.item4 === "item4a"}
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item4b"
                  checked={formValues.item4 === "item4b"}
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item4c"
                  checked={formValues.item4 === "item4c"}
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item4d"
                  checked={formValues.item4 === "item4d"}
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item4e"
                  checked={formValues.item4 === "item4e"}
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                />
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  Ruby
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item5a"
                  checked={formValues.item5 === "item5a"}
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item5b"
                  checked={formValues.item5 === "item5b"}
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item5c"
                  checked={formValues.item5 === "item5c"}
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item5d"
                  checked={formValues.item5 === "item5d"}
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item5e"
                  checked={formValues.item5 === "item5e"}
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                />
              </div>
            </li>
          </ul>
        </form>
        <div className="modal__actions">
          <Button className="button--icon">
            <>
              <i className="icon icon-disk"></i>
              セーブ
            </>
          </Button>
        </div>
      </div>
    </BaseModal>
  )
}

export default ProfileProgrammingModal;
